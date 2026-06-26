<?php

namespace App\Filament\Resources\Exams\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ExamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Exam Details')
                    ->columns(2)
                    ->schema([
                        Select::make('course_id')
                            ->label('Course')
                            ->relationship('course', 'title')
                            ->searchable()
                            ->preload()
                            ->required(),
                        TextInput::make('title')
                            ->label('Exam Title')
                            ->required()
                            ->maxLength(255),
                        Select::make('type')
                            ->options([
                                'exam_1' => 'Exam 1 (30%)',
                                'exam_2' => 'Exam 2 (60%)',
                                'exam_3' => 'Exam 3 (90%)',
                                'graduation_exam' => 'Graduation Exam (100%)',
                            ])
                            ->required(),
                        TextInput::make('progress_required')
                            ->label('Required Progress (%)')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(100)
                            ->required()
                            ->default(0)
                            ->suffix('%'),
                        TextInput::make('duration_minutes')
                            ->label('Duration (minutes)')
                            ->numeric()
                            ->minValue(1)
                            ->required()
                            ->default(60)
                            ->suffix('min'),
                        TextInput::make('total_marks')
                            ->label('Total Marks')
                            ->numeric()
                            ->minValue(1)
                            ->required()
                            ->default(100),
                        TextInput::make('pass_mark')
                            ->label('Pass Mark')
                            ->numeric()
                            ->minValue(0)
                            ->required()
                            ->default(50),
                        TextInput::make('fee')
                            ->label('Exam Fee')
                            ->numeric()
                            ->minValue(0)
                            ->required()
                            ->default(0)
                            ->prefix('$'),
                        Select::make('status')
                            ->options([
                                'draft' => 'Draft',
                                'published' => 'Published',
                                'closed' => 'Closed',
                            ])
                            ->required()
                            ->default('draft'),
                        DateTimePicker::make('published_at')
                            ->label('Published At')
                            ->native(false)
                            ->nullable(),
                    ]),
            ]);
    }
}
