<?php

namespace App\Policies;

use App\Models\User;

class BankReconciliationPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('bank_reconciliation.list');
    }

    public function view(User $user): bool
    {
        return $user->can('bank_reconciliation.list');
    }

    public function create(User $user): bool
    {
        return $user->can('bank_reconciliation.create');
    }

    public function update(User $user): bool
    {
        return $user->can('bank_reconciliation.edit');
    }

    public function delete(User $user): bool
    {
        return $user->can('bank_reconciliation.delete');
    }
}
