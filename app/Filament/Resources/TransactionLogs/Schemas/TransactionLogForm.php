<?php

namespace App\Filament\Resources\TransactionLogs\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TransactionLogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Transaction Log Details')
                    ->columns(2)
                    ->schema([
                        Select::make('payment_id')
                            ->label('Payment')
                            ->relationship('payment', 'id')
                            ->searchable()
                            ->preload()
                            ->required(),
                        TextInput::make('action')
                            ->maxLength(255)
                            ->required(),
                        TextInput::make('status_from')
                            ->label('Status From')
                            ->maxLength(255)
                            ->nullable(),
                        TextInput::make('status_to')
                            ->label('Status To')
                            ->maxLength(255)
                            ->nullable(),
                        Textarea::make('response')
                            ->label('Response (JSON)')
                            ->rows(3)
                            ->nullable(),
                        TextInput::make('ip_address')
                            ->label('IP Address')
                            ->maxLength(45)
                            ->nullable(),
                        TextInput::make('user_agent')
                            ->label('User Agent')
                            ->maxLength(500)
                            ->nullable(),
                        Select::make('created_by')
                            ->label('Created By')
                            ->relationship('createdBy', 'name')
                            ->searchable()
                            ->preload()
                            ->nullable(),
                    ]),
            ]);
    }
}
