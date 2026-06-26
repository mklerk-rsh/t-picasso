<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentCourseFactory extends Factory
{
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
            'course_id' => Course::factory(),
            'enrollment_id' => null,
            'assigned_at' => fake()->dateTimeBetween('-6 months', 'now'),
            'is_active' => true,
        ];
    }
}
