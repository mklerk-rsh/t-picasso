<?php

namespace App\Policies;

use App\Models\User;

class TopicPaymentPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('topic_payment.list');
    }

    public function view(User $user): bool
    {
        return $user->can('topic_payment.list');
    }

    public function create(User $user): bool
    {
        return $user->can('topic_payment.create');
    }

    public function update(User $user): bool
    {
        return $user->can('topic_payment.edit');
    }

    public function delete(User $user): bool
    {
        return $user->can('topic_payment.delete');
    }
}
