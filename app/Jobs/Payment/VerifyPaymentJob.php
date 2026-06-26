<?php

namespace App\Jobs\Payment;

use App\Models\Payment;
use App\Services\Payment\PaymentVerificationService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class VerifyPaymentJob implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Payment $payment,
    ) {}

    public function handle(PaymentVerificationService $verifier): void
    {
        $verifier->verify($this->payment);
    }
}
