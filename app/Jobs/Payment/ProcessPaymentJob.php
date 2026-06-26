<?php

namespace App\Jobs\Payment;

use App\Models\Payment;
use App\Services\Payment\PaymentProcessorService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProcessPaymentJob implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Payment $payment,
    ) {}

    public function handle(PaymentProcessorService $processor): void
    {
        $processor->process($this->payment);
    }
}
