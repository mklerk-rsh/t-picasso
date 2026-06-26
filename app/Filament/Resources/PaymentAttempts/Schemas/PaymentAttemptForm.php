<?php

namespace App\Filament\Resources\PaymentAttempts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PaymentAttemptForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Payment Attempt Details')
                    ->columns(2)
                    ->schema([
                        Select::make('payment_id')
                            ->label('Payment')
                            ->relationship('payment', 'id')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('attempt_number')
                            ->numeric()
                            ->required()
                            ->default(1),
                        Select::make('gateway')
                            ->options([
                                'mpesa' => 'M-Pesa',
                                'paypal' => 'PayPal',
                                'bank_transfer' => 'Bank Transfer',
                            ])
                            ->required(),
                        Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'success' => 'Success',
                                'failed' => 'Failed',
                            ])
                            ->default('pending'),
                        DateTimePicker::make('attempted_at'),
                        Textarea::make('request')
                            ->columnSpanFull()
                            ->rows(3),
                        Textarea::make('response')
                            ->columnSpanFull()
                            ->rows(3),
                    ]),
            ]);
    }
}
