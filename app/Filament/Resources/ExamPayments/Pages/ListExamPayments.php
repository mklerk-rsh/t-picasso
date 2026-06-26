<?php

namespace App\Filament\Resources\ExamPayments\Pages;

use App\Filament\Resources\ExamPayments\ExamPaymentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListExamPayments extends ListRecords
{
    protected static string $resource = ExamPaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
