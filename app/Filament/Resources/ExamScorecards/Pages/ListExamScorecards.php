<?php

namespace App\Filament\Resources\ExamScorecards\Pages;

use App\Filament\Resources\ExamScorecards\ExamScorecardResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListExamScorecards extends ListRecords
{
    protected static string $resource = ExamScorecardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
