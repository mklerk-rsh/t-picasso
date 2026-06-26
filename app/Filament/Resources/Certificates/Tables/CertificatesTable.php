<?php

namespace App\Filament\Resources\Certificates\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class CertificatesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('certificate_number')
                    ->label('Cert #')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('student.user.name')
                    ->label('Student')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('title')
                    ->limit(40)
                    ->searchable(),
                TextColumn::make('type')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'course_completion' => 'Completion',
                        'graduation' => 'Graduation',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'course_completion' => 'info',
                        'graduation' => 'success',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'gray',
                        'issued' => 'success',
                        'revoked' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('issued_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->dateTime()
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
