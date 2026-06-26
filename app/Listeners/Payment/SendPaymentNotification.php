<?php

namespace App\Listeners\Payment;

use App\Events\Payment\PaymentCompleted;
use App\Events\Payment\PaymentFailed;
use App\Events\Payment\PaymentRefunded;
use App\Models\User;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Notification;

class SendPaymentNotification
{
    public function handleCompleted(PaymentCompleted $event): void
    {
        $student = $event->payment->student;
        if (!$student?->user) return;

        $student->user->notify(
            new \App\Notifications\PaymentNotification(
                type: 'payment.completed',
                message: "Payment of \${$event->payment->amount} completed successfully.",
                payment: $event->payment,
            )
        );
    }

    public function handleFailed(PaymentFailed $event): void
    {
        $student = $event->payment->student;
        if (!$student?->user) return;

        $student->user->notify(
            new \App\Notifications\PaymentNotification(
                type: 'payment.failed',
                message: "Payment failed: {$event->reason}",
                payment: $event->payment,
            )
        );
    }

    public function handleRefunded(PaymentRefunded $event): void
    {
        $student = $event->payment->student;
        if (!$student?->user) return;

        $student->user->notify(
            new \App\Notifications\PaymentNotification(
                type: 'payment.refunded',
                message: "Refund of \${$event->payment->amount} processed.",
                payment: $event->payment,
            )
        );
    }

    public function subscribe(Dispatcher $events): void
    {
        $events->listen(PaymentCompleted::class, [self::class, 'handleCompleted']);
        $events->listen(PaymentFailed::class, [self::class, 'handleFailed']);
        $events->listen(PaymentRefunded::class, [self::class, 'handleRefunded']);
    }
}
