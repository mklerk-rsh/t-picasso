<?php

namespace App\Filament\Resources\ExamResults\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ExamResultsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('examSubmission.student.name')
                    ->label('Student')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('examSubmission.examRegistration.exam.title')
                    ->label('Exam')
                    ->searchable()
                    ->limit(30),
                TextColumn::make('marks')
                    ->sortable(),
                TextColumn::make('percentage')
                    ->label('%')
                    ->suffix('%')
                    ->sortable()
                    ->badge()
                    ->color(fn(float $state): string => match (true) {
                        $state >= 80 => 'success',
                        $state >= 60 => 'info',
                        $state >= 50 => 'warning',
                        default => 'danger',
                    }),
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
                IconColumn::make('passed')
                    ->boolean()
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
