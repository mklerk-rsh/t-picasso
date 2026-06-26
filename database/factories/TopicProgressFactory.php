<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\Topic;
use App\Models\TopicProgress;
use Illuminate\Database\Eloquent\Factories\Factory;

class TopicProgressFactory extends Factory
{
    protected $model = TopicProgress::class;

    public function definition(): array
    {
        $status = fake()->randomElement(['not_started', 'in_progress', 'completed']);

        return [
            'student_id' => Student::factory(),
            'topic_id' => Topic::factory(),
            'status' => $status,
            'score' => $status === 'completed' ? fake()->randomFloat(2, 50, 100) : null,
            'completed_at' => $status === 'completed' ? fake()->dateTimeThisYear() : null,
        ];
    }
}
