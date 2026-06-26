<?php

namespace App\Filament\Resources\ExamSubmissions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ExamSubmissionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('student.name')
                    ->label('Student')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('examRegistration.exam.title')
                    ->label('Exam')
                    ->searchable()
                    ->limit(30),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'graded' => 'success',
                        'submitted' => 'info',
                        'in_progress' => 'warning',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('total_marks')
                    ->label('Marks')
                    ->sortable(),
                TextColumn::make('percentage')
                    ->label('%')
                    ->suffix('%')
                    ->sortable(),
                TextColumn::make('submitted_at')
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
