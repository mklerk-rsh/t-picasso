<?php

namespace App\Filament\Resources\ExamScorecards\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ExamScorecardForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Scorecard Details')
                    ->columns(2)
                    ->schema([
                        Select::make('student_id')
                            ->label('Student')
                            ->relationship('student', 'id', fn($q) => $q->with('user'))
                            ->getOptionLabelFromRecordUsing(fn($record) => $record->user?->name . ' (' . $record->student_number . ')')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('exam_id')
                            ->label('Exam')
                            ->relationship('exam', 'title')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('enrollment_id')
                            ->label('Enrollment')
                            ->relationship('enrollment', 'id')
                            ->getOptionLabelFromRecordUsing(fn($record) => 'Enroll #' . $record->id)
                            ->searchable()
                            ->preload()
                            ->nullable(),
                        TextInput::make('marks')
                            ->label('Marks')
                            ->numeric()
                            ->minValue(0)
                            ->required(),
                        Select::make('grade')
                            ->options([
                                'A' => 'A',
                                'B' => 'B',
                                'C' => 'C',
                                'D' => 'D',
                                'F' => 'F',
                            ])
                            ->required(),
                        DateTimePicker::make('generated_at')
                            ->label('Generated At')
                            ->native(false)
                            ->required()
                            ->default(now()),
                    ]),
            ]);
    }
}
