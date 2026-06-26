<?php

namespace App\Filament\Resources\PaymentReconciliations\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PaymentReconciliationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Reconciliation Details')
                    ->columns(2)
                    ->schema([
                        Select::make('payment_id')
                            ->label('Payment')
                            ->relationship('payment', 'id')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->columnSpanFull(),
                        Select::make('gateway')
                            ->options([
                                'mpesa' => 'M-Pesa',
                                'paypal' => 'PayPal',
                                'bank_transfer' => 'Bank Transfer',
                            ])
                            ->required(),
                        TextInput::make('transaction_ref')
                            ->maxLength(255),
                        TextInput::make('amount')
                            ->numeric()
                            ->required(),
                        TextInput::make('gateway_amount')
                            ->numeric()
                            ->required(),
                        Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'matched' => 'Matched',
                                'unmatched' => 'Unmatched',
                            ])
                            ->default('pending'),
                        TextInput::make('discrepancy')
                            ->numeric()
                            ->step(0.01),
                        DateTimePicker::make('reconciled_at'),
                        Textarea::make('notes')
                            ->columnSpanFull()
                            ->rows(3),
                    ]),
            ]);
    }
}
