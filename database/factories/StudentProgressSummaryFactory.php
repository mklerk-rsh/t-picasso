<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentProgressSummaryFactory extends Factory
{
    public function definition(): array
    {
        $total = fake()->numberBetween(5, 30);
        $completed = fake()->numberBetween(0, $total);
        return [
            'student_id' => Student::factory(),
            'course_id' => Course::factory(),
            'total_topics' => $total,
            'completed_topics' => $completed,
            'progress_percentage' => $total > 0 ? round(($completed / $total) * 100, 2) : 0,
            'average_score' => fake()->optional(0.7)->randomFloat(2, 40, 100),
            'total_time_spent_minutes' => fake()->numberBetween(60, 5000),
            'last_activity_at' => fake()->optional(0.8)->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
