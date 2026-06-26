<?php

namespace App\Policies;

use App\Models\User;

class CertificateVerificationPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('certificate_verification.list');
    }

    public function view(User $user): bool
    {
        return $user->can('certificate_verification.list');
    }

    public function create(User $user): bool
    {
        return $user->can('certificate_verification.create');
    }

    public function update(User $user): bool
    {
        return $user->can('certificate_verification.edit');
    }

    public function delete(User $user): bool
    {
        return $user->can('certificate_verification.delete');
    }
}
