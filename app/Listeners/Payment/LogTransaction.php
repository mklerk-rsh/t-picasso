<?php

namespace App\Listeners\Payment;

use App\Events\Payment\PaymentCompleted;
use App\Events\Payment\PaymentFailed;
use App\Events\Payment\PaymentProcessing;
use App\Events\Payment\PaymentRefunded;
use App\Models\TransactionLog;
use Illuminate\Events\Dispatcher;

class LogTransaction
{
    public function handleProcessing(PaymentProcessing $event): void
    {
        TransactionLog::create([
            'payment_id' => $event->payment->id,
            'action' => 'payment.processing',
            'status_from' => 'pending',
            'status_to' => 'processing',
        ]);
    }

    public function handleCompleted(PaymentCompleted $event): void
    {
        TransactionLog::create([
            'payment_id' => $event->payment->id,
            'action' => 'payment.completed',
            'status_from' => 'processing',
            'status_to' => 'successful',
        ]);
    }

    public function handleFailed(PaymentFailed $event): void
    {
        TransactionLog::create([
            'payment_id' => $event->payment->id,
            'action' => 'payment.failed',
            'status_from' => 'processing',
            'status_to' => 'failed',
        ]);
    }

    public function handleRefunded(PaymentRefunded $event): void
    {
        TransactionLog::create([
            'payment_id' => $event->payment->id,
            'action' => 'payment.refunded',
            'status_from' => 'successful',
            'status_to' => 'refunded',
        ]);
    }

    public function subscribe(Dispatcher $events): void
    {
        $events->listen(PaymentProcessing::class, [self::class, 'handleProcessing']);
        $events->listen(PaymentCompleted::class, [self::class, 'handleCompleted']);
        $events->listen(PaymentFailed::class, [self::class, 'handleFailed']);
        $events->listen(PaymentRefunded::class, [self::class, 'handleRefunded']);
    }
}
