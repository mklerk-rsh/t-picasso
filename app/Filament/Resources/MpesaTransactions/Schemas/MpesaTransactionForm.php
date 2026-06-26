<?php

namespace App\Filament\Resources\MpesaTransactions\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class MpesaTransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('M-Pesa Transaction Details')
                    ->columns(2)
                    ->schema([
                        Select::make('payment_id')
                            ->label('Payment')
                            ->relationship('payment', 'id')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('merchant_request_id')
                            ->maxLength(255),
                        TextInput::make('checkout_request_id')
                            ->maxLength(255),
                        TextInput::make('conversation_id')
                            ->maxLength(255),
                        TextInput::make('originator_conversation_id')
                            ->maxLength(255),
                        TextInput::make('response_code')
                            ->maxLength(50),
                        TextInput::make('response_description')
                            ->maxLength(255),
                        TextInput::make('result_code')
                            ->maxLength(50),
                        TextInput::make('result_desc')
                            ->maxLength(255),
                        TextInput::make('transaction_id')
                            ->maxLength(255),
                        TextInput::make('phone_number')
                            ->maxLength(20),
                        TextInput::make('amount')
                            ->numeric(),
                        TextInput::make('receipt_no')
                            ->maxLength(255),
                        Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'success' => 'Success',
                                'failed' => 'Failed',
                            ])
                            ->default('pending'),
                        Textarea::make('raw_response')
                            ->columnSpanFull()
                            ->rows(3),
                        Textarea::make('raw_callback')
                            ->columnSpanFull()
                            ->rows(3),
                    ]),
            ]);
    }
}
