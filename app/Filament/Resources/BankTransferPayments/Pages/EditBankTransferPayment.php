<?php

namespace App\Filament\Resources\BankTransferPayments\Pages;

use App\Filament\Resources\BankTransferPayments\BankTransferPaymentResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditBankTransferPayment extends EditRecord
{
    protected static string $resource = BankTransferPaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
