<?php

namespace App\Filament\Resources\BankTransferPayments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class BankTransferPaymentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('payment.id')
                    ->label('Payment ID')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('bankAccount.account_name')
                    ->label('Bank Account')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('reference_number')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('sender_name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('sender_account')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('sender_bank')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'confirmed' => 'success',
                        'rejected' => 'danger',
                        'pending' => 'gray',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('confirmed_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('confirmedBy.name')
                    ->label('Confirmed By')
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
