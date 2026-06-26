<?php

namespace App\Policies;

use App\Models\User;

class TransactionLogPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('transaction_log.list');
    }

    public function view(User $user): bool
    {
        return $user->can('transaction_log.list');
    }

    public function create(User $user): bool
    {
        return $user->can('transaction_log.create');
    }

    public function update(User $user): bool
    {
        return $user->can('transaction_log.edit');
    }

    public function delete(User $user): bool
    {
        return $user->can('transaction_log.delete');
    }
}
