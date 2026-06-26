<?php

namespace App\Filament\Resources\ExamQuestions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ExamQuestionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('exam.title')
                    ->label('Exam')
                    ->searchable()
                    ->sortable()
                    ->limit(30),
                TextColumn::make('order')
                    ->label('#')
                    ->sortable(),
                TextColumn::make('question_text')
                    ->label('Question')
                    ->html()
                    ->limit(60),
                TextColumn::make('type')
                    ->badge()
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'multiple_choice' => 'MCQ',
                        'true_false' => 'T/F',
                        'essay' => 'Essay',
                        default => $state,
                    }),
                TextColumn::make('marks')
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
            ->defaultSort('exam_id', 'asc')
            ->defaultSort('order', 'asc');
    }
}
