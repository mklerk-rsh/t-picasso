<?php

namespace App\Filament\Resources\Enrollments\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EnrollmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Enrollment Information')
                    ->columns(2)
                    ->schema([
                        Select::make('student_id')
                            ->label('Student')
                            ->relationship('student', 'id', fn($q) => $q->with('user'))
                            ->getOptionLabelFromRecordUsing(fn($record) => $record->user?->name . ' (' . $record->student_number . ')')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('course_id')
                            ->label('Course')
                            ->relationship('course', 'title')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('course_application_id')
                            ->label('Course Application')
                            ->relationship('courseApplication', 'id')
                            ->getOptionLabelFromRecordUsing(fn($record) => 'App #' . $record->id)
                            ->searchable()
                            ->preload()
                            ->nullable(),
                        DateTimePicker::make('enrolled_at')
                            ->label('Enrolled At')
                            ->native(false)
                            ->required()
                            ->default(now()),
                        Select::make('status')
                            ->options([
                                'active' => 'Active',
                                'completed' => 'Completed',
                                'dropped' => 'Dropped',
                                'withdrawn' => 'Withdrawn',
                                'paused' => 'Paused',
                            ])
                            ->required()
                            ->default('active'),
                        TextInput::make('progress_percentage')
                            ->label('Progress (%)')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(100)
                            ->default(0)
                            ->suffix('%'),
                    ]),
            ]);
    }
}
