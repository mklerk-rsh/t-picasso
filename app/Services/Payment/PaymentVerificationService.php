<?php

namespace App\Services\Payment;

use App\Models\Payment;
use App\Models\TransactionLog;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class PaymentVerificationService
{
    public function __construct(
        private PaymentReconciliationService $reconciliationService,
    ) {}

    public function verify(Payment $payment): bool
    {
        if ($payment->status === 'successful' && $payment->paid_at !== null) {
            return true;
        }

        $lock = Cache::lock("payment-verify-{$payment->id}", 10);

        try {
            if (!$lock->get()) {
                return false;
            }

            return DB::transaction(function () use ($payment) {
                if ($payment->status !== 'processing' && $payment->status !== 'pending') {
                    return $payment->status === 'successful';
                }

                if ($this->hasIdempotencyConflict($payment)) {
                    $payment->update(['status' => 'failed']);
                    return false;
                }

                if ($this->isDuplicatePayment($payment)) {
                    $payment->update(['status' => 'rejected']);
                    return false;
                }

                return true;
            });
        } finally {
            $lock->release();
        }
    }

    public function hasIdempotencyConflict(Payment $payment): bool
    {
        if (empty($payment->idempotency_key)) {
            return false;
        }

        return Payment::where('idempotency_key', $payment->idempotency_key)
            ->where('id', '!=', $payment->id)
            ->where('status', 'successful')
            ->exists();
    }

    public function isDuplicatePayment(Payment $payment): bool
    {
        return Payment::where('student_id', $payment->student_id)
            ->where('payable_type', $payment->payable_type)
            ->where('payable_id', $payment->payable_id)
            ->where('status', 'successful')
            ->where('id', '!=', $payment->id)
            ->exists();
    }
}
