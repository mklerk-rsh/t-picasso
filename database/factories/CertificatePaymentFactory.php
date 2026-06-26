<?php

namespace Database\Factories;

use App\Models\Certificate;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CertificatePaymentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'payment_id' => Payment::factory(),
            'certificate_id' => Certificate::factory(),
        ];
    }
}
