<?php

namespace App\Filament\Resources\TopicPayments\Schemas;

use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TopicPaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Topic Payment Details')
                    ->columns(2)
                    ->schema([
                        Select::make('payment_id')
                            ->label('Payment')
                            ->relationship('payment', 'id')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('student_id')
                            ->label('Student')
                            ->relationship('student', 'id')
                            ->getOptionLabelFromRecordUsing(fn ($record) => $record->name)
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('topic_id')
                            ->label('Topic')
                            ->relationship('topic', 'title')
                            ->searchable()
                            ->preload()
                            ->required(),
                    ]),
            ]);
    }
}
