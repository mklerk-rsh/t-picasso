<?php

namespace App\Filament\Resources\CertificateVerifications\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CertificateVerificationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Verification Details')
                    ->columns(2)
                    ->schema([
                        Select::make('certificate_id')
                            ->label('Certificate')
                            ->relationship('certificate', 'certificate_number')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->columnSpanFull(),
                        Select::make('verification_status')
                            ->options([
                                'pending' => 'Pending',
                                'verified' => 'Verified',
                                'failed' => 'Failed',
                                'expired' => 'Expired',
                            ])
                            ->required()
                            ->default('pending'),
                        TextInput::make('verifier_name')
                            ->maxLength(255),
                        TextInput::make('verifier_email')
                            ->email()
                            ->maxLength(255),
                        TextInput::make('ip_address')
                            ->label('IP Address')
                            ->maxLength(45),
                        Textarea::make('verification_metadata')
                            ->label('Verification Metadata (JSON)')
                            ->json()
                            ->columnSpanFull(),
                        DateTimePicker::make('verified_at')
                            ->label('Verified At'),
                    ]),
            ]);
    }
}
