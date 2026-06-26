<?php

namespace App\Filament\Resources\GraduationRecords\Pages;

use App\Filament\Resources\GraduationRecords\GraduationRecordResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditGraduationRecord extends EditRecord
{
    protected static string $resource = GraduationRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
