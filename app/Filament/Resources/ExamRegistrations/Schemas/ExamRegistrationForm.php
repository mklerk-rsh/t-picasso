<?php

namespace App\Filament\Resources\ExamRegistrations\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ExamRegistrationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Registration Details')
                    ->columns(2)
                    ->schema([
                        Select::make('exam_id')
                            ->label('Exam')
                            ->relationship('exam', 'title')
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
                        Select::make('enrollment_id')
                            ->label('Enrollment')
                            ->relationship('enrollment', 'id')
                            ->getOptionLabelFromRecordUsing(fn($record) => 'Enroll #' . $record->id)
                            ->searchable()
                            ->preload()
                            ->nullable(),
                        Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'approved' => 'Approved',
                                'rejected' => 'Rejected',
                                'cancelled' => 'Cancelled',
                            ])
                            ->required()
                            ->default('pending'),
                        DateTimePicker::make('registered_at')
                            ->label('Registered At')
                            ->native(false)
                            ->required()
                            ->default(now()),
                        DateTimePicker::make('approved_at')
                            ->label('Approved At')
                            ->native(false)
                            ->nullable(),
                    ]),
            ]);
    }
}
