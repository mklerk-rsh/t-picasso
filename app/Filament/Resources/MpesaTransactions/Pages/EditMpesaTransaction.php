<?php

namespace App\Filament\Resources\MpesaTransactions\Pages;

use App\Filament\Resources\MpesaTransactions\MpesaTransactionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMpesaTransaction extends EditRecord
{
    protected static string $resource = MpesaTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
