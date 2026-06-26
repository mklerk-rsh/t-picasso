<?php

namespace App\Filament\Resources\TransactionLogs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TransactionLogsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('payment.id')
                    ->label('Payment #')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('action')
                    ->badge()
                    ->sortable(),
                TextColumn::make('status_from')
                    ->label('From')
                    ->badge()
                    ->sortable(),
                TextColumn::make('status_to')
                    ->label('To')
                    ->badge()
                    ->sortable(),
                TextColumn::make('ip_address')
                    ->label('IP')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('createdBy.name')
                    ->label('Created By')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
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
