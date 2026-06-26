<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamFactory extends Factory
{
    public function definition(): array
    {
        return [
            'course_id' => Course::factory(),
            'title' => fake()->sentence(4),
            'type' => fake()->randomElement(['exam_1', 'exam_2', 'exam_3', 'graduation_exam']),
            'progress_required' => fake()->randomElement([0, 30, 60, 90, 100]),
            'duration_minutes' => fake()->randomElement([30, 45, 60, 90, 120]),
            'total_marks' => 100,
            'pass_mark' => 50,
            'fee' => fake()->randomFloat(2, 0, 200),
            'status' => fake()->randomElement(['draft', 'published', 'closed']),
            'published_at' => null,
        ];
    }
}
