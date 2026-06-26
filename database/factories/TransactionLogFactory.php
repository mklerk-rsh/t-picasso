<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionLogFactory extends Factory
{
    public function definition(): array
    {
        return [
            'payment_id' => Payment::factory(),
            'action' => fake()->randomElement(['created', 'processed', 'completed', 'failed', 'refunded']),
            'status_from' => 'pending',
            'status_to' => fake()->randomElement(['completed', 'failed']),
            'response' => ['message' => fake()->sentence()],
            'ip_address' => fake()->ipv4(),
        ];
    }
}
