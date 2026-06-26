<?php

namespace App\Jobs\Payment;

use App\Models\Payment;
use App\Services\Payment\PaymentReconciliationService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ReconcilePaymentJob implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Payment $payment,
    ) {}

    public function handle(PaymentReconciliationService $reconciler): void
    {
        $reconciler->reconcile($this->payment, [
            'amount' => $this->payment->amount,
            'transaction_ref' => $this->payment->transaction_ref,
            'status' => $this->payment->status,
        ]);
    }
}
