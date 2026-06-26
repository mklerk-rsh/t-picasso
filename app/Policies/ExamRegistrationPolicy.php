<?php

namespace App\Policies;

use App\Models\User;

class ExamRegistrationPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('exam.list');
    }

    public function view(User $user): bool
    {
        return $user->can('exam.list');
    }

    public function create(User $user): bool
    {
        return $user->can('exam.register');
    }

    public function update(User $user): bool
    {
        return $user->can('exam.edit');
    }

    public function delete(User $user): bool
    {
        return $user->can('exam.delete');
    }
}
