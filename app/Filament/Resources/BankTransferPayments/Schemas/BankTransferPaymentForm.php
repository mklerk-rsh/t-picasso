<?php

namespace App\Filament\Resources\BankTransferPayments\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BankTransferPaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Bank Transfer Payment Details')
                    ->columns(2)
                    ->schema([
                        Select::make('payment_id')
                            ->relationship('payment', 'id')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('bank_account_id')
                            ->relationship('bankAccount', 'account_name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        TextInput::make('reference_number')
                            ->maxLength(255)
                            ->required(),
                        TextInput::make('sender_name')
                            ->maxLength(255)
                            ->required(),
                        TextInput::make('sender_account')
                            ->maxLength(255)
                            ->required(),
                        TextInput::make('sender_bank')
                            ->maxLength(255)
                            ->required(),
                        FileUpload::make('attachment')
                            ->nullable(),
                        Textarea::make('notes')
                            ->nullable(),
                        Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'confirmed' => 'Confirmed',
                                'rejected' => 'Rejected',
                            ])
                            ->required(),
                        DateTimePicker::make('confirmed_at')
                            ->nullable(),
                        Select::make('confirmed_by')
                            ->relationship('confirmedBy', 'name')
                            ->searchable()
                            ->preload()
                            ->nullable(),
                    ]),
            ]);
    }
}
