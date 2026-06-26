<?php

namespace App\Filament\Resources\PaymentReconciliations\Pages;

use App\Filament\Resources\PaymentReconciliations\PaymentReconciliationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPaymentReconciliations extends ListRecords
{
    protected static string $resource = PaymentReconciliationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
