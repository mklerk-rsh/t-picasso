<?php

namespace App\Filament\Resources\Attendances\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AttendanceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Attendance Details')
                    ->columns(2)
                    ->schema([
                        Select::make('student_id')
                            ->label('Student')
                            ->relationship('student', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('topic_id')
                            ->label('Topic')
                            ->relationship('topic', 'title')
                            ->searchable()
                            ->preload()
                            ->required(),
                        DatePicker::make('date')
                            ->native(false)
                            ->required(),
                        Select::make('status')
                            ->options([
                                'present' => 'Present',
                                'absent' => 'Absent',
                                'late' => 'Late',
                                'excused' => 'Excused',
                            ])
                            ->required()
                            ->default('present'),
                        Select::make('marked_by')
                            ->label('Marked By')
                            ->relationship('markedBy', 'name')
                            ->searchable()
                            ->preload()
                            ->nullable(),
                        Textarea::make('notes')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
