<?php

namespace App\Filament\Resources\ExamScorecards\Pages;

use App\Filament\Resources\ExamScorecards\ExamScorecardResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditExamScorecard extends EditRecord
{
    protected static string $resource = ExamScorecardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
