<?php

namespace App\Filament\Resources\PaymentReconciliations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PaymentReconciliationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable(),
                TextColumn::make('gateway')
                    ->badge()
                    ->sortable(),
                TextColumn::make('transaction_ref')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('amount')
                    ->money('KES')
                    ->sortable(),
                TextColumn::make('gateway_amount')
                    ->money('KES')
                    ->sortable(),
                TextColumn::make('discrepancy')
                    ->money('KES')
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'matched' => 'success',
                        'pending' => 'warning',
                        'unmatched' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('reconciled_at')
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
