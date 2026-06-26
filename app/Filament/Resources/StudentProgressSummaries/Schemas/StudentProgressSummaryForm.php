<?php

namespace App\Filament\Resources\StudentProgressSummaries\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class StudentProgressSummaryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Progress Summary')
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
                        TextInput::make('total_topics')
                            ->label('Total Topics')
                            ->numeric()
                            ->minValue(0)
                            ->default(0)
                            ->required(),
                        TextInput::make('completed_topics')
                            ->label('Completed Topics')
                            ->numeric()
                            ->minValue(0)
                            ->default(0)
                            ->required(),
                        TextInput::make('progress_percentage')
                            ->label('Progress (%)')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(100)
                            ->step(0.01)
                            ->default(0)
                            ->suffix('%'),
                        TextInput::make('average_score')
                            ->label('Average Score')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(100)
                            ->step(0.01)
                            ->nullable()
                            ->suffix('%'),
                        TextInput::make('total_time_spent_minutes')
                            ->label('Total Time (minutes)')
                            ->numeric()
                            ->minValue(0)
                            ->default(0)
                            ->suffix('min'),
                        DateTimePicker::make('last_activity_at')
                            ->label('Last Activity')
                            ->native(false)
                            ->nullable(),
                    ]),
            ]);
    }
}
