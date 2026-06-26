<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class MpesaTransactionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'payment_id' => Payment::factory(),
            'merchant_request_id' => fake()->uuid(),
            'checkout_request_id' => fake()->uuid(),
            'phone_number' => fake()->e164PhoneNumber(),
            'amount' => fake()->randomFloat(2, 10, 5000),
            'status' => 'pending',
        ];
    }
}
