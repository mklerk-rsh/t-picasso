<?php

namespace App\Filament\Resources\BankReconciliations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BankReconciliationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('payment.id')
                    ->label('Payment ID')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('bankTransferPayment.reference_number')
                    ->label('Bank Transfer Ref')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('bankTransaction.description')
                    ->label('Transaction Description')
                    ->searchable()
                    ->sortable()
                    ->limit(30),
                TextColumn::make('match_type')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'exact' => 'success',
                        'partial' => 'warning',
                        'manual' => 'info',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('amount')
                    ->money('USD')
                    ->sortable(),
                TextColumn::make('matched_amount')
                    ->money('USD')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('difference')
                    ->money('USD')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'gray',
                        'matched' => 'success',
                        'discrepancy' => 'danger',
                        'resolved' => 'info',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('reconciled_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
