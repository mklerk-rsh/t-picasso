<?php

namespace App\Policies;

use App\Models\User;

class CertificateTemplatePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('certificate_template.list');
    }

    public function view(User $user): bool
    {
        return $user->can('certificate_template.list');
    }

    public function create(User $user): bool
    {
        return $user->can('certificate_template.create');
    }

    public function update(User $user): bool
    {
        return $user->can('certificate_template.edit');
    }

    public function delete(User $user): bool
    {
        return $user->can('certificate_template.delete');
    }
}
