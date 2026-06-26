<?php

namespace App\Policies;

use App\Models\User;

class CourseCategoryPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('category.list');
    }

    public function view(User $user): bool
    {
        return $user->can('category.list');
    }

    public function create(User $user): bool
    {
        return $user->can('category.create');
    }

    public function update(User $user): bool
    {
        return $user->can('category.edit');
    }

    public function delete(User $user): bool
    {
        return $user->can('category.delete');
    }
}
