<?php

namespace App\Policies;

use App\Models\User;

class PaymentPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('payment.list');
    }

    public function view(User $user): bool
    {
        return $user->can('payment.list');
    }

    public function create(User $user): bool
    {
        return $user->can('payment.create');
    }

    public function update(User $user): bool
    {
        return $user->can('payment.edit');
    }

    public function delete(User $user): bool
    {
        return $user->can('payment.delete');
    }
}
