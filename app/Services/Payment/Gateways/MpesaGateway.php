<?php

namespace App\Services\Payment\Gateways;

use App\Contracts\Payment\PaymentGatewayInterface;
use App\Models\Payment;
use App\Services\Mpesa\MpesaService;
use Illuminate\Support\Facades\Log;

class MpesaGateway implements PaymentGatewayInterface
{
    public function __construct(
        private MpesaService $mpesaService,
    ) {}

    public function process(Payment $payment): array
    {
        try {
            $response = $this->mpesaService->stkPush(
                phone: $payment->paymentMethod?->details['phone'] ?? '',
                amount: $payment->amount,
                reference: $payment->transaction_ref,
                description: $payment->description,
            );

            return [
                'success' => $response['success'] ?? false,
                'transaction_id' => $response['checkout_request_id'] ?? null,
                'message' => $response['message'] ?? 'STK Push sent',
                'response' => $response,
            ];
        } catch (\Throwable $e) {
            Log::error('M-PESA payment failed', [
                'payment_id' => $payment->id,
                'error' => $e->getMessage(),
            ]);

            return [
                'success' => false,
                'message' => $e->getMessage(),
            ];
        }
    }

    public function verify(string $transactionId): array
    {
        try {
            return $this->mpesaService->queryStatus($transactionId);
        } catch (\Throwable $e) {
            return [
                'success' => false,
                'message' => $e->getMessage(),
            ];
        }
    }

    public function refund(Payment $payment, ?float $amount = null): array
    {
        try {
            return $this->mpesaService->reverseTransaction(
                transactionId: $payment->gateway_transaction_id ?? '',
                amount: $amount ?? $payment->amount,
            );
        } catch (\Throwable $e) {
            return [
                'success' => false,
                'message' => $e->getMessage(),
            ];
        }
    }

    public function getStatus(string $transactionId): string
    {
        $result = $this->verify($transactionId);
        return match ($result['result_code'] ?? 1) {
            0 => 'successful',
            1 => 'failed',
            1037 => 'timeout',
            default => 'processing',
        };
    }
}
