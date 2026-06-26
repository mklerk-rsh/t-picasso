<?php

namespace App\Filament\Resources\StudentProgressSummaries\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class StudentProgressSummariesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('student.name')
                    ->label('Student')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('course.title')
                    ->label('Course')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('progress_percentage')
                    ->label('Progress')
                    ->suffix('%')
                    ->sortable()
                    ->badge()
                    ->color(fn (float $state): string => match (true) {
                        $state >= 100 => 'success',
                        $state >= 50 => 'info',
                        $state >= 1 => 'warning',
                        default => 'gray',
                    }),
                TextColumn::make('completed_topics')
                    ->label('Completed')
                    ->sortable(),
                TextColumn::make('total_topics')
                    ->label('Total')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('average_score')
                    ->label('Avg Score')
                    ->suffix('%')
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('total_time_spent_minutes')
                    ->label('Time (min)')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('last_activity_at')
                    ->label('Last Activity')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
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
            ->defaultSort('updated_at', 'desc');
    }
}
