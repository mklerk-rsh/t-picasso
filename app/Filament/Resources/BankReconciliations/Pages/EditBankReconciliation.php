<?php

namespace App\Filament\Resources\BankReconciliations\Pages;

use App\Filament\Resources\BankReconciliations\BankReconciliationResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditBankReconciliation extends EditRecord
{
    protected static string $resource = BankReconciliationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
