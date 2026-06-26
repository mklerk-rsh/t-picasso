<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentMethodFactory extends Factory
{
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
            'type' => fake()->randomElement(['mpesa', 'paypal', 'bank_transfer', 'credit_card']),
            'details' => ['phone' => fake()->phoneNumber(), 'email' => fake()->email()],
            'is_default' => false,
            'is_active' => true,
        ];
    }
}
