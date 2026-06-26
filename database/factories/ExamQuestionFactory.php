<?php

namespace Database\Factories;

use App\Models\Exam;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamQuestionFactory extends Factory
{
    public function definition(): array
    {
        $type = fake()->randomElement(['multiple_choice', 'true_false', 'essay']);
        $options = null;
        $correctAnswer = null;

        if ($type === 'multiple_choice') {
            $options = [
                fake()->sentence(6),
                fake()->sentence(6),
                fake()->sentence(6),
                fake()->sentence(6),
            ];
            $correctAnswer = $options[0];
        } elseif ($type === 'true_false') {
            $options = ['True', 'False'];
            $correctAnswer = fake()->randomElement(['True', 'False']);
        }

        return [
            'exam_id' => Exam::factory(),
            'question_text' => fake()->sentence(10) . '?',
            'type' => $type,
            'options' => $options,
            'correct_answer' => $correctAnswer,
            'marks' => fake()->randomFloat(2, 1, 10),
            'order' => fake()->numberBetween(1, 50),
        ];
    }
}
