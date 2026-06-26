<?php

namespace Database\Factories;

use App\Models\BankAccount;
use App\Models\BankStatement;
use Illuminate\Database\Eloquent\Factories\Factory;

class BankTransactionFactory extends Factory
{
    public function definition(): array
    {
        $isDebit = fake()->boolean();
        $amount = fake()->randomFloat(2, 10, 5000);
        return [
            'bank_account_id' => BankAccount::factory(),
            'bank_statement_id' => BankStatement::factory(),
            'transaction_date' => fake()->dateTimeBetween('-1 month'),
            'description' => fake()->sentence(),
            'debit' => $isDebit ? $amount : 0,
            'credit' => $isDebit ? 0 : $amount,
            'balance' => fake()->randomFloat(2, 1000, 100000),
            'reference' => strtoupper(fake()->bothify('REF-####??')),
            'transaction_type' => $isDebit ? 'debit' : 'credit',
            'status' => 'unmatched',
        ];
    }
}
