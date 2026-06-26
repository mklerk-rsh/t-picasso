<?php

namespace Database\Factories;

use App\Models\CertificateTemplate;
use App\Models\Enrollment;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class CertificateFactory extends Factory
{
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
            'enrollment_id' => Enrollment::factory(),
            'certificate_template_id' => CertificateTemplate::factory(),
            'type' => fake()->randomElement(['course_completion', 'graduation']),
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'status' => 'draft',
        ];
    }

    public function issued(): static
    {
        return $this->state(fn (array $attrs) => [
            'status' => 'issued',
            'certificate_number' => 'PPU-' . now()->format('Y') . '-' . fake()->unique()->numerify('######'),
            'issued_at' => now(),
        ]);
    }
}
