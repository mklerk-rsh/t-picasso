<?php

namespace App\Filament\Resources\PaypalTransactions\Pages;

use App\Filament\Resources\PaypalTransactions\PaypalTransactionResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePaypalTransaction extends CreateRecord
{
    protected static string $resource = PaypalTransactionResource::class;
}
