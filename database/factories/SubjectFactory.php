<?php

namespace Database\Factories;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    protected $model = Subject::class;

    public function definition(): array
    {
        return [
            'teacher_id' => Teacher::factory(),
            'name' => fake()->unique()->words(3, true),
            'code' => strtoupper(fake()->unique()->lexify('???') . fake()->unique()->numerify('###')),
            'description' => fake()->paragraph(),
            'is_active' => true,
        ];
    }
}
