<?php

namespace Database\Factories;

use App\Models\BankTransaction;
use App\Models\BankTransferPayment;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class BankReconciliationFactory extends Factory
{
    public function definition(): array
    {
        $amount = fake()->randomFloat(2, 10, 5000);
        return [
            'payment_id' => Payment::factory(),
            'bank_transfer_payment_id' => BankTransferPayment::factory(),
            'bank_transaction_id' => BankTransaction::factory(),
            'match_type' => fake()->randomElement(['exact', 'partial', 'manual']),
            'amount' => $amount,
            'matched_amount' => $amount,
            'difference' => 0,
            'status' => 'pending',
        ];
    }
}
