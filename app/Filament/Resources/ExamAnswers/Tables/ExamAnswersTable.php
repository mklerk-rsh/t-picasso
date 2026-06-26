<?php

namespace App\Filament\Resources\ExamAnswers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ExamAnswersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('examSubmission.student.name')
                    ->label('Student')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('examQuestion.question_text')
                    ->label('Question')
                    ->html()
                    ->limit(50),
                TextColumn::make('answer_text')
                    ->label('Answer')
                    ->html()
                    ->limit(40),
                TextColumn::make('marks_awarded')
                    ->label('Awarded')
                    ->sortable(),
            ])
            ->filters([])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
