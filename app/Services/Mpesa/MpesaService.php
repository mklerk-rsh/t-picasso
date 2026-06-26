<?php

namespace App\Services\Mpesa;

use App\Models\MpesaTransaction;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MpesaService
{
    private string $baseUrl;
    private ?string $accessToken = null;

    public function __construct()
    {
        $this->baseUrl = env('MPESA_ENV', 'sandbox') === 'production'
            ? 'https://api.safaricom.co.ke'
            : 'https://sandbox.safaricom.co.ke';
    }

    public function authenticate(): string
    {
        $consumerKey = env('MPESA_CONSUMER_KEY');
        $consumerSecret = env('MPESA_CONSUMER_SECRET');

        $response = Http::withBasicAuth($consumerKey, $consumerSecret)
            ->get("{$this->baseUrl}/oauth/v1/generate?grant_type=client_credentials");

        $this->accessToken = $response->json('access_token');
        return $this->accessToken;
    }

    public function stkPush(string $phone, float $amount, string $reference, string $description = ''): array
    {
        $token = $this->accessToken ?? $this->authenticate();

        $shortcode = env('MPESA_SHORTCODE', '174379');
        $passkey = env('MPESA_PASSKEY');
        $timestamp = date('YmdHis');
        $password = base64_encode($shortcode . $passkey . $timestamp);

        $payload = [
            'BusinessShortCode' => $shortcode,
            'Password' => $password,
            'Timestamp' => $timestamp,
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => (int) round($amount),
            'PartyA' => $this->formatPhone($phone),
            'PartyB' => $shortcode,
            'PhoneNumber' => $this->formatPhone($phone),
            'CallBackURL' => env('MPESA_CALLBACK_URL') . '/api/mpesa/callback',
            'AccountReference' => $reference,
            'TransactionDesc' => $description ?: 'Payment',
        ];

        try {
            $response = Http::withToken($token)
                ->post("{$this->baseUrl}/mpesa/stkpush/v1/processrequest", $payload);

            $result = $response->json();
            $success = ($result['ResponseCode'] ?? '1') === '0';

            MpesaTransaction::create([
                'checkout_request_id' => $result['CheckoutRequestID'] ?? null,
                'merchant_request_id' => $result['MerchantRequestID'] ?? null,
                'phone_number' => $phone,
                'amount' => $amount,
                'result_code' => $result['ResponseCode'] ?? '1',
                'result_description' => $result['ResponseDescription'] ?? '',
                'status' => $success ? 'processing' : 'failed',
            ]);

            return [
                'success' => $success,
                'checkout_request_id' => $result['CheckoutRequestID'] ?? null,
                'merchant_request_id' => $result['MerchantRequestID'] ?? null,
                'message' => $result['ResponseDescription'] ?? '',
                'response' => $result,
            ];
        } catch (\Throwable $e) {
            Log::error('M-PESA STK Push failed', ['error' => $e->getMessage()]);
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public function queryStatus(string $checkoutRequestId): array
    {
        $token = $this->accessToken ?? $this->authenticate();
        $shortcode = env('MPESA_SHORTCODE', '174379');
        $passkey = env('MPESA_PASSKEY');
        $timestamp = date('YmdHis');
        $password = base64_encode($shortcode . $passkey . $timestamp);

        $payload = [
            'BusinessShortCode' => $shortcode,
            'Password' => $password,
            'Timestamp' => $timestamp,
            'CheckoutRequestID' => $checkoutRequestId,
        ];

        try {
            $response = Http::withToken($token)
                ->post("{$this->baseUrl}/mpesa/stkpushquery/v1/query", $payload);

            return $response->json();
        } catch (\Throwable $e) {
            Log::error('M-PESA query failed', ['error' => $e->getMessage()]);
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public function reverseTransaction(string $transactionId, float $amount): array
    {
        return ['success' => false, 'message' => 'Reversal requires implementation'];
    }

    public function handleCallback(array $payload): array
    {
        $transaction = MpesaTransaction::where(
            'checkout_request_id',
            $payload['Body']['stkCallback']['CheckoutRequestID'] ?? ''
        )->first();

        if (!$transaction) {
            return ['success' => false, 'message' => 'Transaction not found'];
        }

        $resultCode = $payload['Body']['stkCallback']['ResultCode'] ?? 1;
        $resultDesc = $payload['Body']['stkCallback']['ResultDesc'] ?? '';

        $status = match ((int) $resultCode) {
            0 => 'successful',
            1037 => 'timeout',
            1032 => 'cancelled',
            default => 'failed',
        };

        $metadata = $payload['Body']['stkCallback']['CallbackMetadata']['Item'] ?? [];

        $receiptNumber = null;
        foreach ($metadata as $item) {
            if ($item['Name'] === 'MpesaReceiptNumber') {
                $receiptNumber = $item['Value'];
            }
        }

        $transaction->update([
            'receipt_number' => $receiptNumber,
            'result_code' => (string) $resultCode,
            'result_description' => $resultDesc,
            'callback_payload' => $payload,
            'status' => $status,
        ]);

        return [
            'success' => $status === 'successful',
            'receipt_number' => $receiptNumber,
            'status' => $status,
        ];
    }

    private function formatPhone(string $phone): string
    {
        $phone = preg_replace('/[^0-9]/', '', $phone);
        if (strlen($phone) === 9) $phone = '254' . $phone;
        if (strpos($phone, '0') === 0) $phone = '254' . substr($phone, 1);
        return $phone;
    }
}
