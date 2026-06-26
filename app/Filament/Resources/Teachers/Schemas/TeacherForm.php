<?php

namespace App\Filament\Resources\Teachers\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TeacherForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Teacher Information')
                    ->columns(2)
                    ->schema([
                        Select::make('user_id')
                            ->label('User')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('employee_number')
                            ->label('Employee Number')
                            ->required()
                            ->maxLength(50),
                        TextInput::make('specialization')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('qualification')
                            ->maxLength(255),
                        TextInput::make('years_experience')
                            ->label('Years of Experience')
                            ->numeric()
                            ->minValue(0),
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                        Textarea::make('biography')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
