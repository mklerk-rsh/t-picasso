<?php

namespace App\Policies;

use App\Models\User;

class BankTransferPaymentPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('bank_transfer_payment.list');
    }

    public function view(User $user): bool
    {
        return $user->can('bank_transfer_payment.list');
    }

    public function create(User $user): bool
    {
        return $user->can('bank_transfer_payment.create');
    }

    public function update(User $user): bool
    {
        return $user->can('bank_transfer_payment.edit');
    }

    public function delete(User $user): bool
    {
        return $user->can('bank_transfer_payment.delete');
    }
}
