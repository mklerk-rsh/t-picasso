<?php

namespace Database\Factories;

use App\Models\Certificate;
use App\Models\Enrollment;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class GraduationRecordFactory extends Factory
{
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
            'enrollment_id' => Enrollment::factory(),
            'certificate_id' => Certificate::factory(),
            'graduation_date' => fake()->dateTimeBetween('-1 year'),
            'class' => fake()->randomElement(['First Class', 'Second Class Upper', 'Second Class Lower', 'Pass']),
            'honors' => fake()->optional()->randomElement(['Summa Cum Laude', 'Magna Cum Laude', 'Cum Laude']),
            'gpa' => fake()->randomFloat(2, 2.0, 4.0),
            'remarks' => fake()->sentence(),
            'status' => fake()->randomElement(['pending', 'approved', 'published']),
        ];
    }
}
