<?php

namespace App\Filament\Resources\PaymentReconciliations\Pages;

use App\Filament\Resources\PaymentReconciliations\PaymentReconciliationResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPaymentReconciliation extends EditRecord
{
    protected static string $resource = PaymentReconciliationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
