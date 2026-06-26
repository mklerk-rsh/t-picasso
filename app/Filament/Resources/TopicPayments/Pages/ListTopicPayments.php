<?php

namespace App\Filament\Resources\TopicPayments\Pages;

use App\Filament\Resources\TopicPayments\TopicPaymentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTopicPayments extends ListRecords
{
    protected static string $resource = TopicPaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
