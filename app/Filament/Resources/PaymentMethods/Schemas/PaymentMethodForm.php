<?php

namespace App\Filament\Resources\PaymentMethods\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PaymentMethodForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Payment Method Details')
                    ->columns(2)
                    ->schema([
                        Select::make('student_id')
                            ->label('Student')
                            ->relationship('student', 'id')
                            ->getOptionLabelFromRecordUsing(fn ($record) => $record->name)
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('type')
                            ->options([
                                'credit_card' => 'Credit Card',
                                'mobile_money' => 'Mobile Money',
                                'bank_transfer' => 'Bank Transfer',
                                'cash' => 'Cash',
                            ])
                            ->required(),
                        Textarea::make('details')
                            ->label('Details (JSON)')
                            ->rows(3)
                            ->nullable(),
                        Toggle::make('is_default')
                            ->label('Default'),
                        Toggle::make('is_active')
                            ->label('Active'),
                    ]),
            ]);
    }
}
