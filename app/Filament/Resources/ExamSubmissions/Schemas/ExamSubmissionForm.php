<?php

namespace App\Filament\Resources\ExamSubmissions\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ExamSubmissionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Submission Details')
                    ->columns(2)
                    ->schema([
                        Select::make('exam_registration_id')
                            ->label('Exam Registration')
                            ->relationship('examRegistration', 'id')
                            ->getOptionLabelFromRecordUsing(fn($record) => 'Reg #' . $record->id)
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('student_id')
                            ->label('Student')
                            ->relationship('student', 'id', fn($q) => $q->with('user'))
                            ->getOptionLabelFromRecordUsing(fn($record) => $record->user?->name . ' (' . $record->student_number . ')')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('status')
                            ->options([
                                'in_progress' => 'In Progress',
                                'submitted' => 'Submitted',
                                'graded' => 'Graded',
                            ])
                            ->required()
                            ->default('in_progress'),
                        DateTimePicker::make('submitted_at')
                            ->label('Submitted At')
                            ->native(false)
                            ->nullable(),
                        TextInput::make('total_marks')
                            ->label('Total Marks')
                            ->numeric()
                            ->minValue(0)
                            ->nullable(),
                        TextInput::make('percentage')
                            ->label('Percentage (%)')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(100)
                            ->step(0.01)
                            ->nullable()
                            ->suffix('%'),
                    ]),
            ]);
    }
}
