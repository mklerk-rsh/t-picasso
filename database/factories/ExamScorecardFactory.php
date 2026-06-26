<?php

namespace Database\Factories;

use App\Models\Exam;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamScorecardFactory extends Factory
{
    public function definition(): array
    {
        $marks = fake()->randomFloat(2, 0, 100);
        $grade = match (true) {
            $marks >= 80 => 'A',
            $marks >= 60 => 'B',
            $marks >= 50 => 'C',
            $marks >= 40 => 'D',
            default => 'F',
        };

        return [
            'student_id' => Student::factory(),
            'exam_id' => Exam::factory(),
            'enrollment_id' => null,
            'marks' => $marks,
            'grade' => $grade,
            'generated_at' => now(),
        ];
    }
}
