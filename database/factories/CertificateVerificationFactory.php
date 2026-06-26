<?php

namespace Database\Factories;

use App\Models\Certificate;
use Illuminate\Database\Eloquent\Factories\Factory;

class CertificateVerificationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'certificate_id' => Certificate::factory(),
            'verification_status' => fake()->randomElement(['valid', 'invalid', 'revoked']),
            'verifier_name' => fake()->name(),
            'verifier_email' => fake()->email(),
            'verified_at' => now(),
        ];
    }
}
