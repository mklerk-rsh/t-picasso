<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use App\Models\Certificate;
use App\Models\CertificateTemplate;
use App\Models\CertificateVerification;
use App\Models\MpesaTransaction;
use App\Models\Payment;
use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Phase6PaymentSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            // 1. Certificate Templates
            $template1 = CertificateTemplate::create([
                'name' => 'Standard Course Completion Certificate',
                'type' => 'course_completion',
                'layout_config' => ['orientation' => 'landscape', 'margin_top' => 20, 'margin_bottom' => 20],
                'description' => 'Standard certificate awarded upon course completion',
                'font_family' => 'serif',
                'placeholders' => ['student_name', 'course_name', 'completion_date', 'certificate_number'],
                'is_active' => true,
            ]);

            $template2 = CertificateTemplate::create([
                'name' => 'Graduation Diploma',
                'type' => 'graduation',
                'layout_config' => ['orientation' => 'portrait', 'margin_top' => 25, 'margin_bottom' => 25],
                'description' => 'Official graduation diploma for completed programs',
                'font_family' => 'serif',
                'placeholders' => ['student_name', 'program_name', 'graduation_date', 'honors'],
                'is_active' => true,
            ]);

            // 2. Certificates for students 1-5
            for ($i = 1; $i <= 5; $i++) {
                Certificate::create([
                    'student_id' => $i,
                    'enrollment_id' => null,
                    'certificate_template_id' => $template1->id,
                    'type' => 'course_completion',
                    'title' => 'Course Completion Certificate',
                    'description' => 'Certificate of completion for the enrolled course',
                    'status' => 'draft',
                ]);
            }

            // 3. Payment Methods for students 1-5
            for ($i = 1; $i <= 5; $i++) {
                PaymentMethod::create([
                    'student_id' => $i,
                    'type' => 'mpesa',
                    'details' => ['phone' => '2547' . str_pad((string) fake()->unique()->randomNumber(7), 7, '0', STR_PAD_LEFT)],
                    'is_default' => $i === 1,
                    'is_active' => true,
                ]);
            }

            // 4. Payments - 2 per student
            for ($i = 1; $i <= 5; $i++) {
                Payment::create([
                    'student_id' => $i,
                    'payable_type' => 'App\Models\Enrollment',
                    'payable_id' => $i,
                    'payment_method_id' => $i,
                    'amount' => fake()->randomFloat(2, 100, 2000),
                    'currency' => 'USD',
                    'status' => $i <= 3 ? 'completed' : 'pending',
                    'gateway' => 'mpesa',
                    'transaction_ref' => 'TXN-' . fake()->unique()->uuid(),
                    'idempotency_key' => fake()->unique()->uuid(),
                    'description' => 'Course enrollment payment',
                    'paid_at' => $i <= 3 ? now()->subDays($i) : null,
                ]);

                Payment::create([
                    'student_id' => $i,
                    'payable_type' => 'App\Models\Enrollment',
                    'payable_id' => $i + 5,
                    'payment_method_id' => $i,
                    'amount' => fake()->randomFloat(2, 50, 500),
                    'currency' => 'KES',
                    'status' => 'completed',
                    'gateway' => 'mpesa',
                    'transaction_ref' => 'TXN-' . fake()->unique()->uuid(),
                    'idempotency_key' => fake()->unique()->uuid(),
                    'description' => 'Topic access payment',
                    'paid_at' => now()->subDays($i + 1),
                ]);
            }

            // 5. Mpesa Transactions for completed M-PESA payments
            $completedMpesaPayments = Payment::where('gateway', 'mpesa')->where('status', 'completed')->take(3)->get();
            foreach ($completedMpesaPayments as $payment) {
                MpesaTransaction::create([
                    'payment_id' => $payment->id,
                    'merchant_request_id' => fake()->uuid(),
                    'checkout_request_id' => fake()->uuid(),
                    'phone_number' => '2547' . fake()->numerify('#######'),
                    'amount' => $payment->amount,
                    'receipt_no' => 'MPR' . strtoupper(fake()->bothify('??####')),
                    'result_code' => '0',
                    'result_desc' => 'The service request is processed successfully.',
                    'status' => 'successful',
                ]);
            }

            // 6. Bank Accounts for students 1-3
            $banks = [
                ['bank_name' => 'Equity Bank', 'branch' => 'Nairobi'],
                ['bank_name' => 'KCB', 'branch' => 'Mombasa'],
                ['bank_name' => 'Cooperative Bank', 'branch' => 'Kisumu'],
            ];

            foreach ($banks as $index => $bank) {
                BankAccount::create([
                    'student_id' => $index + 1,
                    'bank_name' => $bank['bank_name'],
                    'account_name' => fake()->name(),
                    'account_number' => fake()->bankAccountNumber(),
                    'branch' => $bank['branch'],
                    'swift_code' => strtoupper(fake()->bothify('?????KEN?')),
                    'currency' => 'KES',
                    'type' => 'savings',
                    'is_active' => true,
                ]);
            }

            // 7. Certificate Verifications
            CertificateVerification::create([
                'certificate_id' => 1,
                'verification_status' => 'valid',
                'verifier_name' => 'Admin User',
                'verifier_email' => 'admin@pichapicasso.edu',
                'verification_metadata' => ['source' => 'admin_panel'],
                'verified_at' => now(),
            ]);

            CertificateVerification::create([
                'certificate_id' => 2,
                'verification_status' => 'valid',
                'verifier_name' => 'Admin User',
                'verifier_email' => 'admin@pichapicasso.edu',
                'verification_metadata' => ['source' => 'admin_panel'],
                'verified_at' => now(),
            ]);
        });
    }
}
