<?php

namespace App\Policies;

use App\Models\User;

class ModulePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('module.list');
    }

    public function view(User $user): bool
    {
        return $user->can('module.list');
    }

    public function create(User $user): bool
    {
        return $user->can('module.create');
    }

    public function update(User $user): bool
    {
        return $user->can('module.edit');
    }

    public function delete(User $user): bool
    {
        return $user->can('module.delete');
    }
}
