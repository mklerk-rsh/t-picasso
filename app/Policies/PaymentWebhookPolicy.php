<?php

namespace App\Policies;

use App\Models\User;

class PaymentWebhookPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('payment_webhook.list');
    }

    public function view(User $user): bool
    {
        return $user->can('payment_webhook.list');
    }

    public function create(User $user): bool
    {
        return $user->can('payment_webhook.create');
    }

    public function update(User $user): bool
    {
        return $user->can('payment_webhook.edit');
    }

    public function delete(User $user): bool
    {
        return $user->can('payment_webhook.delete');
    }
}
