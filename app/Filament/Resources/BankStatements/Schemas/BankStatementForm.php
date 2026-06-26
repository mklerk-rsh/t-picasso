<?php

namespace App\Filament\Resources\BankStatements\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BankStatementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Bank Statement Details')
                    ->columns(2)
                    ->schema([
                        Select::make('bank_account_id')
                            ->relationship('bankAccount', 'account_name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        FileUpload::make('file_path')
                            ->required(),
                        TextInput::make('filename')
                            ->maxLength(255)
                            ->required(),
                        TextInput::make('opening_balance')
                            ->numeric()
                            ->nullable()
                            ->prefix('$'),
                        TextInput::make('closing_balance')
                            ->numeric()
                            ->nullable()
                            ->prefix('$'),
                        DatePicker::make('statement_period_start')
                            ->nullable(),
                        DatePicker::make('statement_period_end')
                            ->nullable(),
                        TextInput::make('total_transactions')
                            ->numeric()
                            ->nullable(),
                        Select::make('status')
                            ->options([
                                'uploaded' => 'Uploaded',
                                'processed' => 'Processed',
                                'reconciled' => 'Reconciled',
                                'failed' => 'Failed',
                            ])
                            ->required(),
                    ]),
            ]);
    }
}
