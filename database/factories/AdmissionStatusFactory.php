<?php

namespace Database\Factories;

use App\Models\CourseApplication;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdmissionStatusFactory extends Factory
{
    public function definition(): array
    {
        return [
            'course_application_id' => CourseApplication::factory(),
            'from_status' => null,
            'to_status' => fake()->randomElement(['pending', 'approved', 'rejected', 'waitlisted']),
            'changed_by' => User::factory(),
            'remarks' => fake()->optional(0.4)->sentence(),
        ];
    }
}
