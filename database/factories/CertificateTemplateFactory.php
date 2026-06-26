<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CertificateTemplateFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Standard Certificate', 'Graduation Diploma', 'Completion Certificate']),
            'type' => fake()->randomElement(['course_completion', 'graduation']),
            'layout_config' => [
                'orientation' => 'landscape',
                'margin_top' => 20,
                'margin_bottom' => 20,
            ],
            'description' => fake()->sentence(),
            'font_family' => 'serif',
            'placeholders' => [
                'student_name', 'course_name', 'completion_date', 'certificate_number',
            ],
            'is_active' => true,
        ];
    }
}
