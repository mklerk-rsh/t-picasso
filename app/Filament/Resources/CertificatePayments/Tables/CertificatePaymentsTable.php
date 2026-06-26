<?php

namespace App\Filament\Resources\CertificatePayments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CertificatePaymentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('payment.id')
                    ->label('Payment #')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('certificate.certificate_number')
                    ->label('Certificate #')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('certificate.title')
                    ->label('Title')
                    ->searchable()
                    ->limit(30),
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
