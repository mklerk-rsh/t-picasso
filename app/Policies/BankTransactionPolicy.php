<?php

namespace App\Policies;

use App\Models\User;

class BankTransactionPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('bank_transaction.list');
    }

    public function view(User $user): bool
    {
        return $user->can('bank_transaction.list');
    }

    public function create(User $user): bool
    {
        return $user->can('bank_transaction.create');
    }

    public function update(User $user): bool
    {
        return $user->can('bank_transaction.edit');
    }

    public function delete(User $user): bool
    {
        return $user->can('bank_transaction.delete');
    }
}
