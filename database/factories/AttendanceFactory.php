<?php

namespace Database\Factories;

use App\Models\Attendance;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFactory extends Factory
{
    protected $model = Attendance::class;

    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
            'topic_id' => Topic::factory(),
            'date' => fake()->dateTimeThisMonth(),
            'status' => fake()->randomElement(['present', 'absent', 'late', 'excused']),
            'marked_by' => Teacher::factory(),
            'notes' => fake()->optional(0.3)->sentence(),
        ];
    }
}
