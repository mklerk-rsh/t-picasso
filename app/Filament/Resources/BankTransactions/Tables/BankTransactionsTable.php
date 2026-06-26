<?php

namespace App\Filament\Resources\BankTransactions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class BankTransactionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('bankAccount.account_name')
                    ->label('Bank Account')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('bankStatement.filename')
                    ->label('Statement')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('transaction_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('description')
                    ->searchable()
                    ->limit(40),
                TextColumn::make('debit')
                    ->money('USD')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('credit')
                    ->money('USD')
                    ->sortable(),
                TextColumn::make('balance')
                    ->money('USD')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('reference')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('transaction_type')
                    ->badge()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'unmatched' => 'gray',
                        'matched' => 'info',
                        'reconciled' => 'success',
                        'flagged' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),
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
            ->defaultSort('transaction_date', 'desc');
    }
}
