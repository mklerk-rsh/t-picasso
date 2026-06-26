<?php

namespace App\Filament\Resources\BankTransactions\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BankTransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Bank Transaction Details')
                    ->columns(2)
                    ->schema([
                        Select::make('bank_account_id')
                            ->relationship('bankAccount', 'account_name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('bank_statement_id')
                            ->relationship('bankStatement', 'filename')
                            ->searchable()
                            ->preload()
                            ->nullable(),
                        Select::make('bank_transfer_payment_id')
                            ->relationship('bankTransferPayment', 'reference_number')
                            ->searchable()
                            ->preload()
                            ->nullable(),
                        DatePicker::make('transaction_date')
                            ->required(),
                        Textarea::make('description')
                            ->nullable(),
                        TextInput::make('debit')
                            ->numeric()
                            ->nullable()
                            ->prefix('$'),
                        TextInput::make('credit')
                            ->numeric()
                            ->nullable()
                            ->prefix('$'),
                        TextInput::make('balance')
                            ->numeric()
                            ->nullable()
                            ->prefix('$'),
                        TextInput::make('reference')
                            ->maxLength(255)
                            ->nullable(),
                        TextInput::make('transaction_type')
                            ->maxLength(255)
                            ->nullable(),
                        Select::make('status')
                            ->options([
                                'unmatched' => 'Unmatched',
                                'matched' => 'Matched',
                                'reconciled' => 'Reconciled',
                                'flagged' => 'Flagged',
                            ])
                            ->required(),
                    ]),
            ]);
    }
}
