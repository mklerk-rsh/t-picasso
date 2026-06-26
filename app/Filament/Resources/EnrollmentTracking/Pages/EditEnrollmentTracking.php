<?php

namespace App\Filament\Resources\EnrollmentTracking\Pages;

use App\Filament\Resources\EnrollmentTracking\EnrollmentTrackingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditEnrollmentTracking extends EditRecord
{
    protected static string $resource = EnrollmentTrackingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
