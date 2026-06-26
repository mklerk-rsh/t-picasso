<?php

namespace App\Filament\Resources\PaypalTransactions\Pages;

use App\Filament\Resources\PaypalTransactions\PaypalTransactionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPaypalTransactions extends ListRecords
{
    protected static string $resource = PaypalTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
