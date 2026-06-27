<?php

namespace App\Services\Payment;

use App\Models\Payment;
use App\Models\PaymentWebhook;
use App\Models\TransactionLog;
use Illuminate\Support\Facades\DB;

class PaymentWebhookService
{
    public function handle(string $gateway, array $payload, array $headers): PaymentWebhook
    {
        $webhook = PaymentWebhook::create([
            'gateway' => $gateway,
            'payload' => $payload,
            'headers' => $headers,
            'status' => 'received',
        ]);

        try {
            $this->validateSignature($gateway, $payload, $headers);
            $this->processWebhook($webhook);
            $webhook->update(['status' => 'processed', 'processed_at' => now()]);
        } catch (\Throwable $e) {
            $webhook->update(['status' => 'failed']);
            throw $e;
        }

        return $webhook;
    }

    private function validateSignature(string $gateway, array $payload, array $headers): void
    {
        if (app()->environment('local')) {
            return;
        }
    }

    private function processWebhook(PaymentWebhook $webhook): void
    {
        $payload = $webhook->payload;
        $transactionId = $payload['transaction_id'] ?? $payload['id'] ?? null;

        if (!$transactionId) return;

        $payment = Payment::where('gateway_transaction_id', $transactionId)->first();
        if (!$payment) return;

        DB::transaction(function () use ($payment, $payload) {
            $newStatus = $this->mapWebhookStatus($payload['status'] ?? '');
            if ($newStatus && $newStatus !== $payment->status) {
                $oldStatus = $payment->status;
                $payment->update([
                    'status' => $newStatus,
                    'gateway_response' => $payload,
                    'paid_at' => $newStatus === 'successful' ? now() : $payment->paid_at,
                ]);

                TransactionLog::create([
                    'payment_id' => $payment->id,
                    'action' => "webhook.{$newStatus}",
                    'status_from' => $oldStatus,
                    'status_to' => $newStatus,
                    'response' => $payload,
                ]);
            }
        });
    }

    private function mapWebhookStatus(string $status): ?string
    {
        return match (strtolower($status)) {
            'completed', 'success', 'successful' => 'successful',
            'failed', 'cancelled', 'timeout' => 'failed',
            'refunded' => 'refunded',
            default => null,
        };
    }
}
