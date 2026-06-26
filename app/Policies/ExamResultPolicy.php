<?php

namespace App\Policies;

use App\Models\User;

class ExamResultPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('exam.list');
    }

    public function view(User $user): bool
    {
        return $user->can('exam-result.view-own');
    }

    public function create(User $user): bool
    {
        return $user->can('exam.grade');
    }

    public function update(User $user): bool
    {
        return $user->can('exam.grade');
    }

    public function delete(User $user): bool
    {
        return $user->can('exam.delete');
    }
}
