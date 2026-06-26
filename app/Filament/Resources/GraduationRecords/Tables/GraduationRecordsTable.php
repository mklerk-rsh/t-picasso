<?php

namespace App\Filament\Resources\GraduationRecords\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GraduationRecordsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable(),
                TextColumn::make('student.name')
                    ->label('Student')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('graduation_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('class')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('gpa')
                    ->numeric(decimalPlaces: 2)
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'graduated' => 'success',
                        'approved' => 'info',
                        'honored' => 'warning',
                        'pending' => 'gray',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
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
