<?php

namespace Database\Factories;

use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnrollmentTrackingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'enrollment_id' => Enrollment::factory(),
            'from_status' => null,
            'to_status' => fake()->randomElement(['active', 'paused', 'completed', 'dropped', 'withdrawn']),
            'changed_by' => User::factory(),
            'reason' => fake()->optional(0.5)->sentence(),
        ];
    }
}
