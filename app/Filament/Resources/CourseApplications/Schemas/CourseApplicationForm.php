<?php

namespace App\Filament\Resources\CourseApplications\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CourseApplicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Application Details')
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
                        Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'approved' => 'Approved',
                                'rejected' => 'Rejected',
                                'waitlisted' => 'Waitlisted',
                            ])
                            ->required()
                            ->default('pending'),
                        DateTimePicker::make('applied_at')
                            ->label('Applied At')
                            ->native(false)
                            ->required()
                            ->default(now()),
                        DateTimePicker::make('reviewed_at')
                            ->label('Reviewed At')
                            ->native(false)
                            ->nullable(),
                        Select::make('reviewed_by')
                            ->label('Reviewed By')
                            ->relationship('reviewedBy', 'name')
                            ->searchable()
                            ->preload()
                            ->nullable(),
                        RichEditor::make('notes')
                            ->label('Notes')
                            ->columnSpanFull()
                            ->nullable(),
                    ]),
            ]);
    }
}
