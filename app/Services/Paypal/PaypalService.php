<?php

namespace App\Services\Paypal;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaypalService
{
    private string $baseUrl;
    private ?string $accessToken = null;

    public function __construct()
    {
        $this->baseUrl = config('services.paypal.mode', 'sandbox') === 'live'
            ? 'https://api-m.paypal.com'
            : 'https://api-m.sandbox.paypal.com';
    }

    public function authenticate(): string
    {
        $clientId = config('services.paypal.client_id');
        $clientSecret = config('services.paypal.client_secret');

        $response = Http::withBasicAuth($clientId, $clientSecret)
            ->asForm()
            ->post("{$this->baseUrl}/v1/oauth2/token", [
                'grant_type' => 'client_credentials',
            ]);

        $this->accessToken = $response->json('access_token');
        return $this->accessToken;
    }

    public function createOrder(float $amount, string $reference, string $description = ''): array
    {
        $token = $this->accessToken ?? $this->authenticate();

        $payload = [
            'intent' => 'CAPTURE',
            'purchase_units' => [[
                'reference_id' => $reference,
                'description' => $description ?: 'Payment',
                'amount' => [
                    'currency_code' => 'USD',
                    'value' => number_format($amount, 2, '.', ''),
                ],
            ]],
            'payment_source' => [
                'paypal' => [
                    'experience_context' => [
                        'payment_method_preference' => 'IMMEDIATE_PAYMENT_REQUIRED',
                        'landing_page' => 'LOGIN',
                        'user_action' => 'PAY_NOW',
                    ],
                ],
            ],
        ];

        try {
            $response = Http::withToken($token)
                ->withHeader('Content-Type', 'application/json')
                ->post("{$this->baseUrl}/v2/checkout/orders", $payload);

            $result = $response->json();
            $approvalUrl = null;

            foreach ($result['links'] ?? [] as $link) {
                if ($link['rel'] === 'approve') {
                    $approvalUrl = $link['href'];
                }
            }

            return [
                'success' => ($result['status'] ?? '') === 'CREATED',
                'id' => $result['id'] ?? null,
                'status' => $result['status'] ?? 'failed',
                'approval_url' => $approvalUrl,
                'response' => $result,
            ];
        } catch (\Throwable $e) {
            Log::error('PayPal order creation failed', ['error' => $e->getMessage()]);
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public function captureOrder(string $orderId): array
    {
        $token = $this->accessToken ?? $this->authenticate();

        try {
            $response = Http::withToken($token)
                ->withHeader('Content-Type', 'application/json')
                ->post("{$this->baseUrl}/v2/checkout/orders/{$orderId}/capture");

            $result = $response->json();

            return [
                'success' => ($result['status'] ?? '') === 'COMPLETED',
                'id' => $result['id'] ?? null,
                'status' => $result['status'] ?? 'failed',
                'capture_id' => $result['purchase_units'][0]['payments']['captures'][0]['id'] ?? null,
                'response' => $result,
            ];
        } catch (\Throwable $e) {
            Log::error('PayPal capture failed', ['error' => $e->getMessage()]);
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public function refundPayment(string $transactionId, float $amount): array
    {
        $token = $this->accessToken ?? $this->authenticate();

        try {
            $response = Http::withToken($token)
                ->withHeader('Content-Type', 'application/json')
                ->post("{$this->baseUrl}/v2/payments/captures/{$transactionId}/refund", [
                    'amount' => [
                        'currency_code' => 'USD',
                        'value' => number_format($amount, 2, '.', ''),
                    ],
                ]);

            $result = $response->json();

            return [
                'success' => ($result['status'] ?? '') === 'COMPLETED',
                'id' => $result['id'] ?? null,
                'status' => $result['status'] ?? 'failed',
                'response' => $result,
            ];
        } catch (\Throwable $e) {
            Log::error('PayPal refund failed', ['error' => $e->getMessage()]);
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public function getOrderStatus(string $orderId): string
    {
        $token = $this->accessToken ?? $this->authenticate();

        try {
            $response = Http::withToken($token)
                ->get("{$this->baseUrl}/v2/checkout/orders/{$orderId}");

            $status = $response->json('status', 'failed');

            return match ($status) {
                'COMPLETED', 'APPROVED' => 'successful',
                'CREATED' => 'pending',
                'VOIDED' => 'failed',
                default => 'processing',
            };
        } catch (\Throwable $e) {
            return 'failed';
        }
    }
}
