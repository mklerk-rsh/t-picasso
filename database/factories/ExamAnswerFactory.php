<?php

namespace Database\Factories;

use App\Models\ExamQuestion;
use App\Models\ExamSubmission;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamAnswerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'exam_submission_id' => ExamSubmission::factory(),
            'exam_question_id' => ExamQuestion::factory(),
            'answer_text' => fake()->sentence(),
            'marks_awarded' => null,
        ];
    }
}
