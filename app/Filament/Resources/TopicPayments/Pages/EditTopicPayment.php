<?php

namespace App\Filament\Resources\TopicPayments\Pages;

use App\Filament\Resources\TopicPayments\TopicPaymentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTopicPayment extends EditRecord
{
    protected static string $resource = TopicPaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
