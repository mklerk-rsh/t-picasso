<?php

namespace App\Policies;

use App\Models\User;

class TopicPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('topic.list');
    }

    public function view(User $user): bool
    {
        return $user->can('topic.list');
    }

    public function create(User $user): bool
    {
        return $user->can('topic.create');
    }

    public function update(User $user): bool
    {
        return $user->can('topic.edit');
    }

    public function delete(User $user): bool
    {
        return $user->can('topic.delete');
    }
}
