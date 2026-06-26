<?php

namespace App\Filament\Resources\StudentProgressSummaries\Pages;

use App\Filament\Resources\StudentProgressSummaries\StudentProgressSummaryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditStudentProgressSummary extends EditRecord
{
    protected static string $resource = StudentProgressSummaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
