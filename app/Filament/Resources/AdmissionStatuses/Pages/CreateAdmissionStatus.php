<?php

namespace App\Filament\Resources\AdmissionStatuses\Pages;

use App\Filament\Resources\AdmissionStatuses\AdmissionStatusResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAdmissionStatus extends CreateRecord
{
    protected static string $resource = AdmissionStatusResource::class;
}
