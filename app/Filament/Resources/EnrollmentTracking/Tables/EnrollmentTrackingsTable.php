<?php

namespace App\Filament\Resources\EnrollmentTracking\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EnrollmentTrackingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('enrollment.student.name')
                    ->label('Student')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('enrollment.course.title')
                    ->label('Course')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('from_status')
                    ->label('From')
                    ->badge()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('to_status')
                    ->label('To')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'active' => 'success',
                        'completed' => 'info',
                        'dropped' => 'danger',
                        'withdrawn' => 'gray',
                        'paused' => 'warning',
                        default => 'gray',
                    }),
                TextColumn::make('changedBy.name')
                    ->label('Changed By')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Changed At'),
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
