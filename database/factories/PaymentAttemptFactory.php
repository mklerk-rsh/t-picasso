<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentAttemptFactory extends Factory
{
    public function definition(): array
    {
        return [
            'payment_id' => Payment::factory(),
            'attempt_number' => 1,
            'gateway' => fake()->randomElement(['mpesa', 'paypal', 'bank_transfer']),
            'request' => ['amount' => fake()->randomFloat(2, 10, 5000)],
            'response' => ['status' => 'pending'],
            'status' => 'pending',
        ];
    }
}
