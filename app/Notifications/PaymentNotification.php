<?php

namespace App\Notifications;

use App\Models\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public string $type,
        public string $message,
        public Payment $payment,
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("Payment {$this->type}")
            ->line($this->message)
            ->line("Amount: \${$this->payment->amount}")
            ->line("Reference: {$this->payment->transaction_ref}")
            ->action('View Payment', url("/admin/payments/{$this->payment->id}/edit"));
    }

    public function toArray(object $notifiable): array
    {
        return [
            'type' => $this->type,
            'message' => $this->message,
            'payment_id' => $this->payment->id,
            'amount' => $this->payment->amount,
            'reference' => $this->payment->transaction_ref,
        ];
    }
}
