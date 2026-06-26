<?php

namespace App\Filament\Resources\CertificatePayments\Pages;

use App\Filament\Resources\CertificatePayments\CertificatePaymentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCertificatePayments extends ListRecords
{
    protected static string $resource = CertificatePaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
