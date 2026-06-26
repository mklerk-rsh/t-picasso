<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentReconciliationFactory extends Factory
{
    public function definition(): array
    {
        $amount = fake()->randomFloat(2, 10, 5000);
        return [
            'payment_id' => Payment::factory(),
            'gateway' => fake()->randomElement(['mpesa', 'paypal', 'bank_transfer']),
            'transaction_ref' => fake()->uuid(),
            'amount' => $amount,
            'gateway_amount' => $amount,
            'status' => fake()->randomElement(['pending', 'matched', 'discrepancy']),
            'reconciled_at' => null,
        ];
    }
}
