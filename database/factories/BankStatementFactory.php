<?php

namespace Database\Factories;

use App\Models\BankAccount;
use Illuminate\Database\Eloquent\Factories\Factory;

class BankStatementFactory extends Factory
{
    public function definition(): array
    {
        return [
            'bank_account_id' => BankAccount::factory(),
            'file_path' => 'statements/' . fake()->uuid() . '.csv',
            'filename' => fake()->word() . '.csv',
            'opening_balance' => 0,
            'closing_balance' => fake()->randomFloat(2, 1000, 100000),
            'statement_period_start' => now()->subMonth(),
            'statement_period_end' => now(),
            'total_transactions' => fake()->numberBetween(5, 50),
            'status' => 'uploaded',
        ];
    }
}
