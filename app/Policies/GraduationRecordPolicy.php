<?php

namespace App\Policies;

use App\Models\User;

class GraduationRecordPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('graduation_record.list');
    }

    public function view(User $user): bool
    {
        return $user->can('graduation_record.list');
    }

    public function create(User $user): bool
    {
        return $user->can('graduation_record.create');
    }

    public function update(User $user): bool
    {
        return $user->can('graduation_record.edit');
    }

    public function delete(User $user): bool
    {
        return $user->can('graduation_record.delete');
    }
}
