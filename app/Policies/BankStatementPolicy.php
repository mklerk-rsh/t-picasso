<?php

namespace App\Policies;

use App\Models\User;

class BankStatementPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('bank_statement.list');
    }

    public function view(User $user): bool
    {
        return $user->can('bank_statement.list');
    }

    public function create(User $user): bool
    {
        return $user->can('bank_statement.create');
    }

    public function update(User $user): bool
    {
        return $user->can('bank_statement.edit');
    }

    public function delete(User $user): bool
    {
        return $user->can('bank_statement.delete');
    }
}
