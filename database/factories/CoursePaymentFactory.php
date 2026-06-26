<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CoursePaymentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'payment_id' => Payment::factory(),
            'enrollment_id' => Enrollment::factory(),
            'course_id' => Course::factory(),
        ];
    }
}
