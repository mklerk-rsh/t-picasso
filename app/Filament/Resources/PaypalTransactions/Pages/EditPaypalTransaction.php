<?php

namespace App\Filament\Resources\PaypalTransactions\Pages;

use App\Filament\Resources\PaypalTransactions\PaypalTransactionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPaypalTransaction extends EditRecord
{
    protected static string $resource = PaypalTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
