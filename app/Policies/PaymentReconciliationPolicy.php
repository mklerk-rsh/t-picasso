<?php

namespace App\Policies;

use App\Models\User;

class PaymentReconciliationPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('payment_reconciliation.list');
    }

    public function view(User $user): bool
    {
        return $user->can('payment_reconciliation.list');
    }

    public function create(User $user): bool
    {
        return $user->can('payment_reconciliation.create');
    }

    public function update(User $user): bool
    {
        return $user->can('payment_reconciliation.edit');
    }

    public function delete(User $user): bool
    {
        return $user->can('payment_reconciliation.delete');
    }
}
