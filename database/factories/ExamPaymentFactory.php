<?php

namespace Database\Factories;

use App\Models\ExamRegistration;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamPaymentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'exam_registration_id' => ExamRegistration::factory(),
            'amount' => fake()->randomFloat(2, 10, 500),
            'status' => fake()->randomElement(['pending', 'completed', 'failed', 'refunded']),
            'paid_at' => null,
            'payment_method' => fake()->randomElement(['mobile_money', 'card', 'bank_transfer', 'cash']),
            'transaction_ref' => 'TXN-' . strtoupper(fake()->bothify('??####??')),
        ];
    }
}
