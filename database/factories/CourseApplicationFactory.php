<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseApplicationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
            'course_id' => Course::factory(),
            'status' => fake()->randomElement(['pending', 'approved', 'rejected', 'waitlisted']),
            'applied_at' => fake()->dateTimeBetween('-3 months', 'now'),
            'reviewed_at' => null,
            'reviewed_by' => null,
            'notes' => fake()->optional(0.3)->sentence(),
        ];
    }
}
