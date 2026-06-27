<?php

namespace App\Services\Payment;

use App\Contracts\Payment\PaymentGatewayInterface;
use App\Services\Payment\Gateways\BankTransferGateway;
use App\Services\Payment\Gateways\MpesaGateway;
use App\Services\Payment\Gateways\PaypalGateway;
use InvalidArgumentException;

class PaymentGatewayFactory
{
    public function __construct(
        private MpesaGateway $mpesaGateway,
        private PaypalGateway $paypalGateway,
        private BankTransferGateway $bankTransferGateway,
    ) {}

    public function make(string $gateway): PaymentGatewayInterface
    {
        return match ($gateway) {
            'mpesa', 'simulated_mpesa' => $this->mpesaGateway,
            'paypal', 'simulated_paypal' => $this->paypalGateway,
            'bank_transfer', 'simulated_bank' => $this->bankTransferGateway,
            default => throw new InvalidArgumentException("Unsupported payment gateway: {$gateway}"),
        };
    }
}
