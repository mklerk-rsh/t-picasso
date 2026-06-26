<?php

namespace App\Filament\Resources\BankReconciliations\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BankReconciliationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Bank Reconciliation Details')
                    ->columns(2)
                    ->schema([
                        Select::make('payment_id')
                            ->relationship('payment', 'id')
                            ->searchable()
                            ->preload()
                            ->nullable(),
                        Select::make('bank_transfer_payment_id')
                            ->relationship('bankTransferPayment', 'reference_number')
                            ->searchable()
                            ->preload()
                            ->nullable(),
                        Select::make('bank_transaction_id')
                            ->relationship('bankTransaction', 'description')
                            ->searchable()
                            ->preload()
                            ->nullable(),
                        Select::make('match_type')
                            ->options([
                                'exact' => 'Exact',
                                'partial' => 'Partial',
                                'manual' => 'Manual',
                            ])
                            ->required(),
                        TextInput::make('amount')
                            ->numeric()
                            ->required()
                            ->prefix('$'),
                        TextInput::make('matched_amount')
                            ->numeric()
                            ->nullable()
                            ->prefix('$'),
                        TextInput::make('difference')
                            ->numeric()
                            ->nullable()
                            ->prefix('$'),
                        Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'matched' => 'Matched',
                                'discrepancy' => 'Discrepancy',
                                'resolved' => 'Resolved',
                            ])
                            ->required(),
                        DateTimePicker::make('reconciled_at')
                            ->nullable(),
                        Textarea::make('notes')
                            ->nullable()
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
