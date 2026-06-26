<?php

namespace App\Services\Payment\Gateways;

use App\Contracts\Payment\PaymentGatewayInterface;
use App\Models\Payment;
use App\Services\Paypal\PaypalService;
use Illuminate\Support\Facades\Log;

class PaypalGateway implements PaymentGatewayInterface
{
    public function __construct(
        private PaypalService $paypalService,
    ) {}

    public function process(Payment $payment): array
    {
        try {
            $response = $this->paypalService->createOrder(
                amount: $payment->amount,
                reference: $payment->transaction_ref,
                description: $payment->description,
            );

            return [
                'success' => ($response['status'] ?? '') === 'created',
                'transaction_id' => $response['id'] ?? null,
                'approval_url' => $response['approval_url'] ?? null,
                'message' => 'PayPal order created',
                'response' => $response,
            ];
        } catch (\Throwable $e) {
            Log::error('PayPal payment failed', [
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
            return $this->paypalService->captureOrder($transactionId);
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
            return $this->paypalService->refundPayment(
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
        return $this->paypalService->getOrderStatus($transactionId);
    }
}
