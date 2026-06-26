<?php

namespace App\Filament\Resources\ExamAnswers\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ExamAnswerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Answer Details')
                    ->columns(2)
                    ->schema([
                        Select::make('exam_submission_id')
                            ->label('Exam Submission')
                            ->relationship('examSubmission', 'id')
                            ->getOptionLabelFromRecordUsing(fn($record) => 'Submission #' . $record->id)
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('exam_question_id')
                            ->label('Question')
                            ->relationship('examQuestion', 'question_text')
                            ->searchable()
                            ->preload()
                            ->required(),
                        RichEditor::make('answer_text')
                            ->label('Answer')
                            ->columnSpanFull()
                            ->nullable(),
                        TextInput::make('marks_awarded')
                            ->label('Marks Awarded')
                            ->numeric()
                            ->minValue(0)
                            ->nullable(),
                    ]),
            ]);
    }
}
