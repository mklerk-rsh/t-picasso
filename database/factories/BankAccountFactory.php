<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class BankAccountFactory extends Factory
{
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
            'bank_name' => fake()->randomElement(['Equity Bank', 'KCB', 'Cooperative Bank', 'NCBA', 'Absa']),
            'account_name' => fake()->name(),
            'account_number' => fake()->bankAccountNumber(),
            'branch' => fake()->city(),
            'swift_code' => strtoupper(fake()->bothify('?????KEN?')),
            'currency' => 'KES',
            'type' => fake()->randomElement(['savings', 'current']),
            'is_active' => true,
        ];
    }
}
