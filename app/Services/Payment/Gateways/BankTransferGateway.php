<?php

namespace App\Services\Payment\Gateways;

use App\Contracts\Payment\PaymentGatewayInterface;
use App\Models\BankAccount;
use App\Models\Payment;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BankTransferGateway implements PaymentGatewayInterface
{
    public function process(Payment $payment): array
    {
        try {
            $bank = BankAccount::where('is_active', true)->inRandomOrder()->first();

            $reference = 'BTX-' . strtoupper(Str::random(10));

            return [
                'success' => true,
                'transaction_id' => $reference,
                'message' => 'Bank transfer instructions generated',
                'bank_details' => $bank ? [
                    'bank_name' => $bank->bank_name,
                    'account_name' => $bank->account_name,
                    'account_number' => $bank->account_number,
                    'branch' => $bank->branch,
                    'swift_code' => $bank->swift_code,
                    'reference' => $reference,
                    'student_reference' => 'STU-' . $payment->student_id,
                ] : [],
            ];
        } catch (\Throwable $e) {
            Log::error('Bank transfer reference generation failed', [
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
        return [
            'success' => true,
            'status' => 'pending',
            'message' => 'Bank transfers require manual verification',
        ];
    }

    public function refund(Payment $payment, ?float $amount = null): array
    {
        return [
            'success' => false,
            'message' => 'Bank transfer refunds require manual processing',
        ];
    }

    public function getStatus(string $transactionId): string
    {
        return 'pending';
    }
}
