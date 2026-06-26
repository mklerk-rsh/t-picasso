<?php

namespace App\Filament\Resources\CertificatePayments\Schemas;

use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CertificatePaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Certificate Payment Details')
                    ->columns(2)
                    ->schema([
                        Select::make('payment_id')
                            ->label('Payment')
                            ->relationship('payment', 'id')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('certificate_id')
                            ->label('Certificate')
                            ->relationship('certificate', 'certificate_number')
                            ->getOptionLabelFromRecordUsing(fn ($record) => $record->certificate_number . ' - ' . $record->title)
                            ->searchable()
                            ->preload()
                            ->required(),
                    ]),
            ]);
    }
}
