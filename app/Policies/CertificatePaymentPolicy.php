<?php

namespace App\Policies;

use App\Models\User;

class CertificatePaymentPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('certificate_payment.list');
    }

    public function view(User $user): bool
    {
        return $user->can('certificate_payment.list');
    }

    public function create(User $user): bool
    {
        return $user->can('certificate_payment.create');
    }

    public function update(User $user): bool
    {
        return $user->can('certificate_payment.edit');
    }

    public function delete(User $user): bool
    {
        return $user->can('certificate_payment.delete');
    }
}
