<?php

namespace App\Contracts\Payment;

use App\Models\Payment;

interface PaymentGatewayInterface
{
    public function process(Payment $payment): array;

    public function verify(string $transactionId): array;

    public function refund(Payment $payment, ?float $amount = null): array;

    public function getStatus(string $transactionId): string;
}
