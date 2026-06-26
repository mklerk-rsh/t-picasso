<?php

namespace App\Filament\Resources\ExamPayments\Pages;

use App\Filament\Resources\ExamPayments\ExamPaymentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditExamPayment extends EditRecord
{
    protected static string $resource = ExamPaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
