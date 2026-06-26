<?php

namespace App\Filament\Resources\Exams\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class ExamsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('course.title')
                    ->label('Course')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(40),
                TextColumn::make('type')
                    ->badge()
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'exam_1' => 'Exam 1',
                        'exam_2' => 'Exam 2',
                        'exam_3' => 'Exam 3',
                        'graduation_exam' => 'Graduation',
                        default => $state,
                    })
                    ->color(fn(string $state): string => match ($state) {
                        'exam_1' => 'info',
                        'exam_2' => 'warning',
                        'exam_3' => 'danger',
                        'graduation_exam' => 'success',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('progress_required')
                    ->label('Progress Req.')
                    ->suffix('%')
                    ->sortable(),
                TextColumn::make('fee')
                    ->money('USD')
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'published' => 'success',
                        'draft' => 'gray',
                        'closed' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('duration_minutes')
                    ->label('Duration')
                    ->suffix('min')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
