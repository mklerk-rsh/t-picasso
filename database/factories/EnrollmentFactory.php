<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\CourseApplication;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnrollmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
            'course_id' => Course::factory(),
            'course_application_id' => null,
            'enrolled_at' => fake()->dateTimeBetween('-6 months', 'now'),
            'status' => fake()->randomElement(['active', 'active', 'active', 'completed', 'paused']),
            'progress_percentage' => fake()->numberBetween(0, 100),
        ];
    }
}
