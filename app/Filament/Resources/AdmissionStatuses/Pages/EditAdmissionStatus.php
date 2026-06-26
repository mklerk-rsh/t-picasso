<?php

namespace App\Filament\Resources\AdmissionStatuses\Pages;

use App\Filament\Resources\AdmissionStatuses\AdmissionStatusResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAdmissionStatus extends EditRecord
{
    protected static string $resource = AdmissionStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
