<?php

namespace App\Filament\Resources\ExamResults\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ExamResultForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Result Details')
                    ->columns(2)
                    ->schema([
                        Select::make('exam_submission_id')
                            ->label('Exam Submission')
                            ->relationship('examSubmission', 'id')
                            ->getOptionLabelFromRecordUsing(fn($record) => 'Submission #' . $record->id)
                            ->searchable()
                            ->preload()
                            ->required()
                            ->unique(),
                        TextInput::make('marks')
                            ->label('Total Marks')
                            ->numeric()
                            ->minValue(0)
                            ->required(),
                        TextInput::make('percentage')
                            ->label('Percentage (%)')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(100)
                            ->step(0.01)
                            ->required()
                            ->suffix('%'),
                        Select::make('grade')
                            ->options([
                                'A' => 'A (80-100)',
                                'B' => 'B (60-79)',
                                'C' => 'C (50-59)',
                                'D' => 'D (40-49)',
                                'F' => 'F (0-39)',
                            ])
                            ->required(),
                        Toggle::make('passed')
                            ->label('Passed')
                            ->default(false),
                        RichEditor::make('remarks')
                            ->label('Remarks')
                            ->columnSpanFull()
                            ->nullable(),
                    ]),
            ]);
    }
}
