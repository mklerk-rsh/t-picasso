<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TeacherFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'employee_number' => 'EMP-' . str_pad(fake()->unique()->randomNumber(4), 4, '0', STR_PAD_LEFT),
            'specialization' => fake()->randomElement([
                'Computer Science', 'Database Engineering', 'Web Security',
                'Marketing', 'Accounting', 'Photography', 'Videography',
                'Graphics Design', 'Electrical Engineering',
            ]),
            'qualification' => fake()->randomElement(['PhD', "Master's Degree", "Bachelor's Degree", 'Diploma']),
            'biography' => fake()->paragraphs(2, true),
            'years_experience' => fake()->numberBetween(2, 20),
            'avatar' => null,
            'is_active' => true,
        ];
    }
}
