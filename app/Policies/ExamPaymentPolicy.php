<?php

namespace App\Policies;

use App\Models\User;

class ExamPaymentPolicy
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
        return $user->can('payment.make');
    }

    public function update(User $user): bool
    {
        return $user->can('payment.verify');
    }

    public function delete(User $user): bool
    {
        return $user->can('payment.refund');
    }
}
