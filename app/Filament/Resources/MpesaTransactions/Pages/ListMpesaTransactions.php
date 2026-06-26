<?php

namespace App\Filament\Resources\MpesaTransactions\Pages;

use App\Filament\Resources\MpesaTransactions\MpesaTransactionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMpesaTransactions extends ListRecords
{
    protected static string $resource = MpesaTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
