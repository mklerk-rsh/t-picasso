<?php

namespace Database\Factories;

use App\Models\ExamSubmission;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamResultFactory extends Factory
{
    public function definition(): array
    {
        $percentage = fake()->randomFloat(2, 0, 100);
        $grade = match (true) {
            $percentage >= 80 => 'A',
            $percentage >= 60 => 'B',
            $percentage >= 50 => 'C',
            $percentage >= 40 => 'D',
            default => 'F',
        };

        return [
            'exam_submission_id' => ExamSubmission::factory(),
            'marks' => $percentage,
            'percentage' => $percentage,
            'grade' => $grade,
            'remarks' => fake()->optional(0.5)->sentence(),
            'passed' => $percentage >= 50,
        ];
    }
}
