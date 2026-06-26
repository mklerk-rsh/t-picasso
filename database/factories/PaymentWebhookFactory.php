<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentWebhookFactory extends Factory
{
    public function definition(): array
    {
        return [
            'gateway' => fake()->randomElement(['mpesa', 'paypal']),
            'payload' => ['event' => fake()->randomElement(['payment.completed', 'payment.failed'])],
            'status' => 'received',
        ];
    }
}
