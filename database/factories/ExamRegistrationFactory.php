<?php

namespace Database\Factories;

use App\Models\Exam;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamRegistrationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'exam_id' => Exam::factory(),
            'student_id' => Student::factory(),
            'enrollment_id' => null,
            'status' => fake()->randomElement(['pending', 'approved', 'rejected', 'cancelled']),
            'registered_at' => now(),
            'approved_at' => null,
        ];
    }
}
