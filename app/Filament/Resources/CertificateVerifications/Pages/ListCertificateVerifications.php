<?php

namespace App\Filament\Resources\CertificateVerifications\Pages;

use App\Filament\Resources\CertificateVerifications\CertificateVerificationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCertificateVerifications extends ListRecords
{
    protected static string $resource = CertificateVerificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
