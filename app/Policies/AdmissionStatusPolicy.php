<?php

namespace App\Policies;

use App\Models\User;

class AdmissionStatusPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('enrollment.list');
    }

    public function view(User $user): bool
    {
        return $user->can('enrollment.list');
    }

    public function create(User $user): bool
    {
        return $user->can('enrollment.create');
    }

    public function update(User $user): bool
    {
        return $user->can('enrollment.edit');
    }

    public function delete(User $user): bool
    {
        return $user->can('enrollment.delete');
    }
}
