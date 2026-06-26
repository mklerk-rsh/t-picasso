<?php

namespace App\Filament\Resources\ExamPayments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ExamPaymentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('examRegistration.student.name')
                    ->label('Student')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('examRegistration.exam.title')
                    ->label('Exam')
                    ->searchable()
                    ->limit(30),
                TextColumn::make('amount')
                    ->money('USD')
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'completed' => 'success',
                        'pending' => 'warning',
                        'failed' => 'danger',
                        'refunded' => 'info',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('payment_method')
                    ->label('Method')
                    ->toggleable(),
                TextColumn::make('paid_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('transaction_ref')
                    ->label('Txn Ref')
                    ->toggleable(isToggledHiddenByDefault: true),
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
