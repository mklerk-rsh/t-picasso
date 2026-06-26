<?php

namespace App\Policies;

use App\Models\User;

class PaypalTransactionPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('paypal_transaction.list');
    }

    public function view(User $user): bool
    {
        return $user->can('paypal_transaction.list');
    }

    public function create(User $user): bool
    {
        return $user->can('paypal_transaction.create');
    }

    public function update(User $user): bool
    {
        return $user->can('paypal_transaction.edit');
    }

    public function delete(User $user): bool
    {
        return $user->can('paypal_transaction.delete');
    }
}
