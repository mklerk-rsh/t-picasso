<?php

namespace App\Policies;

use App\Models\User;

class PaypalWebhookPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('paypal_webhook.list');
    }

    public function view(User $user): bool
    {
        return $user->can('paypal_webhook.list');
    }

    public function create(User $user): bool
    {
        return $user->can('paypal_webhook.create');
    }

    public function update(User $user): bool
    {
        return $user->can('paypal_webhook.edit');
    }

    public function delete(User $user): bool
    {
        return $user->can('paypal_webhook.delete');
    }
}
