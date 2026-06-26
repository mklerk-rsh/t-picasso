<?php

namespace App\Filament\Resources\AdmissionStatuses\Pages;

use App\Filament\Resources\AdmissionStatuses\AdmissionStatusResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAdmissionStatuses extends ListRecords
{
    protected static string $resource = AdmissionStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
