<?php

namespace App\Filament\Resources\CertificatePayments\Pages;

use App\Filament\Resources\CertificatePayments\CertificatePaymentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCertificatePayment extends EditRecord
{
    protected static string $resource = CertificatePaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
