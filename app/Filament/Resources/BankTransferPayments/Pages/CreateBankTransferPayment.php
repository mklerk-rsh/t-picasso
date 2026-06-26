<?php

namespace App\Filament\Resources\BankTransferPayments\Pages;

use App\Filament\Resources\BankTransferPayments\BankTransferPaymentResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBankTransferPayment extends CreateRecord
{
    protected static string $resource = BankTransferPaymentResource::class;
}
