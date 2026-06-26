<?php

namespace App\Filament\Resources\ExamRegistrations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ExamRegistrationsTable
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
                    ->sortable()
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
                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'approved' => 'success',
                        'pending' => 'warning',
                        'rejected' => 'danger',
                        'cancelled' => 'gray',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('registered_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('approved_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
