<?php

namespace App\Listeners\Payment;

use App\Events\Payment\PaymentCompleted;
use App\Models\Enrollment;
use Illuminate\Events\Dispatcher;

class UpdateEnrollmentOnPayment
{
    public function handle(PaymentCompleted $event): void
    {
        $payment = $event->payment;

        if ($payment->payable_type === 'course' && $payment->payable_id) {
            Enrollment::where('student_id', $payment->student_id)
                ->where('course_id', $payment->payable_id)
                ->where('status', 'active')
                ->update(['status' => 'active']);
        }
    }

    public function subscribe(Dispatcher $events): void
    {
        $events->listen(PaymentCompleted::class, [self::class, 'handle']);
    }
}
