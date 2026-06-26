<?php

namespace App\Filament\Resources\EnrollmentTracking\Pages;

use App\Filament\Resources\EnrollmentTracking\EnrollmentTrackingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEnrollmentTrackings extends ListRecords
{
    protected static string $resource = EnrollmentTrackingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
