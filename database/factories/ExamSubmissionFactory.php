<?php

namespace Database\Factories;

use App\Models\ExamRegistration;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamSubmissionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'exam_registration_id' => ExamRegistration::factory(),
            'student_id' => Student::factory(),
            'submitted_at' => null,
            'status' => 'in_progress',
            'total_marks' => null,
            'percentage' => null,
        ];
    }
}
