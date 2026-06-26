<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Student Information')
                    ->columns(2)
                    ->schema([
                        Select::make('user_id')
                            ->label('User')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('student_number')
                            ->label('Student Number')
                            ->required()
                            ->maxLength(50)
                            ->unique(ignoreRecord: true),
                        DatePicker::make('admission_date')
                            ->label('Admission Date')
                            ->native(false)
                            ->required(),
                        Select::make('status')
                            ->options([
                                'active' => 'Active',
                                'inactive' => 'Inactive',
                                'suspended' => 'Suspended',
                                'graduated' => 'Graduated',
                                'withdrawn' => 'Withdrawn',
                            ])
                            ->required()
                            ->default('active'),
                        TextInput::make('profile_photo')
                            ->label('Profile Photo URL')
                            ->maxLength(255),
                    ]),
            ]);
    }
}
