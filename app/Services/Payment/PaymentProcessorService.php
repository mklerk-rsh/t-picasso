<?php

namespace App\Services\Payment;

use App\Events\Payment\PaymentCompleted;
use App\Events\Payment\PaymentFailed;
use App\Events\Payment\PaymentProcessing;
use App\Models\Payment;
use App\Models\PaymentAttempt;
use App\Models\TransactionLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaymentProcessorService
{
    public function __construct(
        private PaymentGatewayFactory $gatewayFactory,
        private PaymentVerificationService $verificationService,
    ) {}

    public function process(Payment $payment): Payment
    {
        $payment->update(['status' => 'processing']);

        event(new PaymentProcessing($payment));

        $attempt = PaymentAttempt::create([
            'payment_id' => $payment->id,
            'attempt_number' => PaymentAttempt::where('payment_id', $payment->id)->count() + 1,
            'gateway' => $payment->gateway,
            'status' => 'processing',
            'attempted_at' => now(),
        ]);

        try {
            $gateway = $this->gatewayFactory->make($payment->gateway ?? 'simulated_mpesa');
            $result = $gateway->process($payment);

            $attempt->update([
                'request' => ['payment_id' => $payment->id, 'amount' => $payment->amount],
                'response' => $result,
                'status' => $result['success'] ? 'successful' : 'failed',
            ]);

            if ($result['success']) {
                DB::transaction(function () use ($payment, $result) {
                    $payment->update([
                        'status' => 'successful',
                        'gateway_transaction_id' => $result['transaction_id'] ?? null,
                        'gateway_response' => $result,
                        'paid_at' => now(),
                    ]);

                    TransactionLog::create([
                        'payment_id' => $payment->id,
                        'action' => 'payment.completed',
                        'status_from' => 'processing',
                        'status_to' => 'successful',
                        'response' => $result,
                    ]);
                });

                event(new PaymentCompleted($payment));
            } else {
                $this->handleFailure($payment, $attempt, $result);
            }
        } catch (\Throwable $e) {
            $attempt->update([
                'request' => ['payment_id' => $payment->id, 'amount' => $payment->amount],
                'response' => ['error' => $e->getMessage()],
                'status' => 'failed',
            ]);

            $this->handleFailure($payment, $attempt, [
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }

        return $payment->fresh();
    }

    public function verify(Payment $payment): bool
    {
        return $this->verificationService->verify($payment);
    }

    public function refund(Payment $payment, ?float $amount = null): Payment
    {
        $gateway = $this->gatewayFactory->make($payment->gateway ?? 'simulated_mpesa');
        $result = $gateway->refund($payment, $amount);

        if ($result['success'] ?? false) {
            DB::transaction(function () use ($payment, $result) {
                $payment->update([
                    'status' => 'refunded',
                    'gateway_response' => $result,
                ]);

                TransactionLog::create([
                    'payment_id' => $payment->id,
                    'action' => 'payment.refunded',
                    'status_from' => 'successful',
                    'status_to' => 'refunded',
                    'response' => $result,
                ]);
            });
        }

        return $payment->fresh();
    }

    private function handleFailure(Payment $payment, PaymentAttempt $attempt, array $result): void
    {
        $payment->update([
            'status' => 'failed',
            'gateway_response' => $result,
        ]);

        TransactionLog::create([
            'payment_id' => $payment->id,
            'action' => 'payment.failed',
            'status_from' => 'processing',
            'status_to' => 'failed',
            'response' => $result,
        ]);

        event(new PaymentFailed($payment, $result['message'] ?? 'Unknown error'));
    }
}
