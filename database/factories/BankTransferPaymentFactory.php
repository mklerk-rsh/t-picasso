<?php

namespace Database\Factories;

use App\Models\BankAccount;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class BankTransferPaymentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'payment_id' => Payment::factory(),
            'bank_account_id' => BankAccount::factory(),
            'reference_number' => 'BTF-' . fake()->unique()->uuid(),
            'sender_name' => fake()->name(),
            'sender_account' => fake()->bankAccountNumber(),
            'sender_bank' => fake()->randomElement(['Equity Bank', 'KCB', 'Cooperative Bank']),
            'status' => 'pending',
        ];
    }
}
