<?php

namespace App\Policies;

use App\Models\User;

class PaymentAttemptPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('payment_attempt.list');
    }

    public function view(User $user): bool
    {
        return $user->can('payment_attempt.list');
    }

    public function create(User $user): bool
    {
        return $user->can('payment_attempt.create');
    }

    public function update(User $user): bool
    {
        return $user->can('payment_attempt.edit');
    }

    public function delete(User $user): bool
    {
        return $user->can('payment_attempt.delete');
    }
}
