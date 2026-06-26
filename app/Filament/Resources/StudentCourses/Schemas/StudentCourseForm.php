<?php

namespace App\Filament\Resources\StudentCourses\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class StudentCourseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Course Assignment')
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
                        Select::make('enrollment_id')
                            ->label('Enrollment')
                            ->relationship('enrollment', 'id')
                            ->getOptionLabelFromRecordUsing(fn($record) => 'Enroll #' . $record->id)
                            ->searchable()
                            ->preload()
                            ->nullable(),
                        DateTimePicker::make('assigned_at')
                            ->label('Assigned At')
                            ->native(false)
                            ->required()
                            ->default(now()),
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ]),
            ]);
    }
}
