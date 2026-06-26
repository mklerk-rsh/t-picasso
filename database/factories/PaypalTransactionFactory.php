<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaypalTransactionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'payment_id' => Payment::factory(),
            'paypal_order_id' => 'ORDER_' . fake()->uuid(),
            'paypal_capture_id' => 'CAPTURE_' . fake()->uuid(),
            'payer_id' => fake()->uuid(),
            'payer_email' => fake()->email(),
            'amount' => fake()->randomFloat(2, 10, 5000),
            'currency' => 'USD',
            'status' => 'pending',
        ];
    }
}
