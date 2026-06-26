<?php

namespace App\Policies;

use App\Models\User;

class BankAccountPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('bank_account.list');
    }

    public function view(User $user): bool
    {
        return $user->can('bank_account.list');
    }

    public function create(User $user): bool
    {
        return $user->can('bank_account.create');
    }

    public function update(User $user): bool
    {
        return $user->can('bank_account.edit');
    }

    public function delete(User $user): bool
    {
        return $user->can('bank_account.delete');
    }
}
