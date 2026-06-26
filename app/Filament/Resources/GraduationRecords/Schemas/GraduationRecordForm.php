<?php

namespace App\Filament\Resources\GraduationRecords\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GraduationRecordForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Graduation Details')
                    ->columns(2)
                    ->schema([
                        Select::make('student_id')
                            ->label('Student')
                            ->relationship('student', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('enrollment_id')
                            ->label('Enrollment')
                            ->relationship('enrollment', 'id')
                            ->searchable()
                            ->preload(),
                        Select::make('certificate_id')
                            ->label('Certificate')
                            ->relationship('certificate', 'certificate_number')
                            ->searchable()
                            ->preload(),
                        DatePicker::make('graduation_date')
                            ->required(),
                        TextInput::make('class')
                            ->maxLength(255),
                        TextInput::make('honors')
                            ->maxLength(255),
                        TextInput::make('gpa')
                            ->label('GPA')
                            ->numeric()
                            ->step(0.01)
                            ->minValue(0)
                            ->maxValue(4.0),
                        Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'approved' => 'Approved',
                                'graduated' => 'Graduated',
                                'honored' => 'Honored',
                            ])
                            ->required()
                            ->default('pending'),
                        Textarea::make('remarks')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
