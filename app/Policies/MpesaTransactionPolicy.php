<?php

namespace App\Policies;

use App\Models\User;

class MpesaTransactionPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('mpesa_transaction.list');
    }

    public function view(User $user): bool
    {
        return $user->can('mpesa_transaction.list');
    }

    public function create(User $user): bool
    {
        return $user->can('mpesa_transaction.create');
    }

    public function update(User $user): bool
    {
        return $user->can('mpesa_transaction.edit');
    }

    public function delete(User $user): bool
    {
        return $user->can('mpesa_transaction.delete');
    }
}
