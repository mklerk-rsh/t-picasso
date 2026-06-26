<?php

namespace App\Policies;

use App\Models\User;

class PaymentMethodPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('payment_method.list');
    }

    public function view(User $user): bool
    {
        return $user->can('payment_method.list');
    }

    public function create(User $user): bool
    {
        return $user->can('payment_method.create');
    }

    public function update(User $user): bool
    {
        return $user->can('payment_method.edit');
    }

    public function delete(User $user): bool
    {
        return $user->can('payment_method.delete');
    }
}
