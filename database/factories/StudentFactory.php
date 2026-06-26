<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StudentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'student_number' => 'STU-' . str_pad(fake()->unique()->randomNumber(5), 5, '0', STR_PAD_LEFT),
            'admission_date' => fake()->dateTimeBetween('-2 years', 'now'),
            'status' => fake()->randomElement(['active', 'active', 'active', 'suspended', 'graduated']),
            'profile_photo' => null,
        ];
    }
}
