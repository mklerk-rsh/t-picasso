<?php

namespace App\Filament\Resources\BankAccounts\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BankAccountForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Bank Account Details')
                    ->columns(2)
                    ->schema([
                        Select::make('student_id')
                            ->label('Student')
                            ->relationship('student', 'id')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('bank_name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('account_name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('account_number')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('branch')
                            ->maxLength(255),
                        TextInput::make('swift_code')
                            ->maxLength(50),
                        TextInput::make('iban')
                            ->maxLength(50),
                        TextInput::make('routing_number')
                            ->maxLength(50),
                        TextInput::make('currency')
                            ->maxLength(10)
                            ->default('KES'),
                        Select::make('type')
                            ->options([
                                'checking' => 'Checking',
                                'savings' => 'Savings',
                            ])
                            ->default('checking'),
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ]),
            ]);
    }
}
