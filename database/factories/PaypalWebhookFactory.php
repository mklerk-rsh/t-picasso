<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaypalWebhookFactory extends Factory
{
    public function definition(): array
    {
        return [
            'event_type' => fake()->randomElement(['PAYMENT.CAPTURE.COMPLETED', 'PAYMENT.CAPTURE.DENIED', 'PAYMENT.CAPTURE.REFUNDED']),
            'resource_type' => 'capture',
            'resource_id' => fake()->uuid(),
            'summary' => fake()->sentence(),
            'payload' => ['id' => fake()->uuid()],
            'status' => 'received',
        ];
    }
}
