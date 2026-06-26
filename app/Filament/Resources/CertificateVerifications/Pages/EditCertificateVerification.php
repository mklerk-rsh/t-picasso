<?php

namespace App\Filament\Resources\CertificateVerifications\Pages;

use App\Filament\Resources\CertificateVerifications\CertificateVerificationResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCertificateVerification extends EditRecord
{
    protected static string $resource = CertificateVerificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
