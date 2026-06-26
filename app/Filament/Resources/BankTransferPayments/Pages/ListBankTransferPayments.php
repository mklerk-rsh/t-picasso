<?php

namespace App\Filament\Resources\BankTransferPayments\Pages;

use App\Filament\Resources\BankTransferPayments\BankTransferPaymentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBankTransferPayments extends ListRecords
{
    protected static string $resource = BankTransferPaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
