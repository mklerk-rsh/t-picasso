<?php

namespace App\Policies;

use App\Models\User;

class CoursePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('course.list');
    }

    public function view(User $user): bool
    {
        return $user->can('course.list');
    }

    public function create(User $user): bool
    {
        return $user->can('course.create');
    }

    public function update(User $user): bool
    {
        return $user->can('course.edit');
    }

    public function delete(User $user): bool
    {
        return $user->can('course.delete');
    }
}
