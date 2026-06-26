<?php

namespace Database\Factories;

use App\Models\Payment;
use App\Models\Student;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;

class TopicPaymentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'payment_id' => Payment::factory(),
            'student_id' => Student::factory(),
            'topic_id' => Topic::factory(),
        ];
    }
}
