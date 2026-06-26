<?php

namespace App\Filament\Resources\Payments\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Payment Details')
                    ->columns(2)
                    ->schema([
                        Select::make('student_id')
                            ->relationship('student.user', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        TextInput::make('amount')
                            ->numeric()
                            ->required()
                            ->prefix('$'),
                        Select::make('currency')
                            ->options([
                                'USD' => 'USD',
                                'KES' => 'KES',
                                'EUR' => 'EUR',
                            ])
                            ->required(),
                        Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'completed' => 'Completed',
                                'failed' => 'Failed',
                                'refunded' => 'Refunded',
                            ])
                            ->required(),
                        Select::make('gateway')
                            ->options([
                                'mpesa' => 'M-PESA',
                                'paypal' => 'PayPal',
                                'bank_transfer' => 'Bank Transfer',
                            ])
                            ->nullable(),
                        TextInput::make('transaction_ref')
                            ->maxLength(255)
                            ->nullable(),
                        TextInput::make('gateway_transaction_id')
                            ->maxLength(255)
                            ->nullable(),
                        TextInput::make('idempotency_key')
                            ->maxLength(255)
                            ->nullable(),
                        Textarea::make('description')
                            ->nullable(),
                        DateTimePicker::make('paid_at')
                            ->nullable(),
                    ]),
            ]);
    }
}
