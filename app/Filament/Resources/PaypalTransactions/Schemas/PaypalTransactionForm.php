<?php

namespace App\Filament\Resources\PaypalTransactions\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PaypalTransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('PayPal Transaction Details')
                    ->columns(2)
                    ->schema([
                        Select::make('payment_id')
                            ->label('Payment')
                            ->relationship('payment', 'id')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('paypal_order_id')
                            ->maxLength(255),
                        TextInput::make('paypal_capture_id')
                            ->maxLength(255),
                        TextInput::make('paypal_refund_id')
                            ->maxLength(255),
                        TextInput::make('payer_id')
                            ->maxLength(255),
                        TextInput::make('payer_email')
                            ->email()
                            ->maxLength(255),
                        TextInput::make('amount')
                            ->numeric(),
                        TextInput::make('currency')
                            ->maxLength(10)
                            ->default('USD'),
                        Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'completed' => 'Completed',
                                'refunded' => 'Refunded',
                                'failed' => 'Failed',
                            ])
                            ->default('pending'),
                        Textarea::make('raw_response')
                            ->columnSpanFull()
                            ->rows(3),
                    ]),
            ]);
    }
}
