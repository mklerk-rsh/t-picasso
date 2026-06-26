<?php

namespace App\Filament\Resources\ExamQuestions\Schemas;

use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ExamQuestionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Question Details')
                    ->columns(2)
                    ->schema([
                        Select::make('exam_id')
                            ->label('Exam')
                            ->relationship('exam', 'title')
                            ->searchable()
                            ->preload()
                            ->required(),
                        RichEditor::make('question_text')
                            ->label('Question')
                            ->columnSpanFull()
                            ->required(),
                        Select::make('type')
                            ->options([
                                'multiple_choice' => 'Multiple Choice',
                                'true_false' => 'True/False',
                                'essay' => 'Essay',
                            ])
                            ->required()
                            ->default('multiple_choice'),
                        TextInput::make('marks')
                            ->label('Marks')
                            ->numeric()
                            ->minValue(0)
                            ->required()
                            ->default(1),
                        TextInput::make('order')
                            ->label('Order')
                            ->numeric()
                            ->minValue(0)
                            ->required()
                            ->default(0),
                        RichEditor::make('correct_answer')
                            ->label('Correct Answer')
                            ->columnSpanFull()
                            ->nullable(),
                    ]),
            ]);
    }
}
