<?php

namespace Database\Factories;

use App\Models\PaymentMethod;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
            'payable_type' => 'App\Models\Enrollment',
            'payable_id' => 1,
            'payment_method_id' => PaymentMethod::factory(),
            'amount' => fake()->randomFloat(2, 10, 5000),
            'currency' => fake()->randomElement(['USD', 'KES', 'EUR']),
            'status' => fake()->randomElement(['pending', 'completed', 'failed', 'refunded']),
            'gateway' => fake()->randomElement(['mpesa', 'paypal', 'bank_transfer']),
            'gateway_transaction_id' => fake()->uuid(),
            'transaction_ref' => fake()->uuid(),
            'idempotency_key' => fake()->uuid(),
            'description' => fake()->sentence(),
            'paid_at' => null,
        ];
    }

    public function completed(): static
    {
        return $this->state(fn (array $attrs) => [
            'status' => 'completed',
            'paid_at' => now(),
        ]);
    }

    public function failed(): static
    {
        return $this->state(fn (array $attrs) => ['status' => 'failed']);
    }
}
