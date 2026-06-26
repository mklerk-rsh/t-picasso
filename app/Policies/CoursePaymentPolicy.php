<?php

namespace App\Policies;

use App\Models\User;

class CoursePaymentPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('course_payment.list');
    }

    public function view(User $user): bool
    {
        return $user->can('course_payment.list');
    }

    public function create(User $user): bool
    {
        return $user->can('course_payment.create');
    }

    public function update(User $user): bool
    {
        return $user->can('course_payment.edit');
    }

    public function delete(User $user): bool
    {
        return $user->can('course_payment.delete');
    }
}
