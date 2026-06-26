<?php

namespace App\Filament\Resources\StudentProgressSummaries\Pages;

use App\Filament\Resources\StudentProgressSummaries\StudentProgressSummaryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListStudentProgressSummaries extends ListRecords
{
    protected static string $resource = StudentProgressSummaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
