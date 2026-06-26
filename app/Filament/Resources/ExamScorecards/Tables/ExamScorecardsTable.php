<?php

namespace App\Filament\Resources\ExamScorecards\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ExamScorecardsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('student.name')
                    ->label('Student')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('exam.title')
                    ->label('Exam')
                    ->searchable()
                    ->limit(30),
                TextColumn::make('exam.type')
                    ->label('Type')
                    ->badge()
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'exam_1' => 'Exam 1',
                        'exam_2' => 'Exam 2',
                        'exam_3' => 'Exam 3',
                        'graduation_exam' => 'Graduation',
                        default => $state,
                    }),
                TextColumn::make('marks')
                    ->sortable(),
                TextColumn::make('grade')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'A' => 'success',
                        'B' => 'info',
                        'C' => 'warning',
                        'D' => 'danger',
                        'F' => 'gray',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('generated_at')
                    ->dateTime()
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
