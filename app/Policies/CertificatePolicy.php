<?php

namespace App\Policies;

use App\Models\User;

class CertificatePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('certificate.list');
    }

    public function view(User $user): bool
    {
        return $user->can('certificate.list');
    }

    public function create(User $user): bool
    {
        return $user->can('certificate.create');
    }

    public function update(User $user): bool
    {
        return $user->can('certificate.edit');
    }

    public function delete(User $user): bool
    {
        return $user->can('certificate.delete');
    }
}
