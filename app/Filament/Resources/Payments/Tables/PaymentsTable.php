<?php

namespace App\Filament\Resources\Payments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class PaymentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('student.user.name')
                    ->label('Student')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('amount')
                    ->money('USD')
                    ->sortable(),
                TextColumn::make('currency')
                    ->badge()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'completed' => 'success',
                        'failed' => 'danger',
                        'refunded' => 'warning',
                        'pending' => 'gray',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('gateway')
                    ->badge()
                    ->sortable(),
                TextColumn::make('gateway_transaction_id')
                    ->label('Gateway TXN')
                    ->searchable(),
                TextColumn::make('paid_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
