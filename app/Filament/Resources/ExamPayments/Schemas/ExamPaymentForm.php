<?php

namespace App\Filament\Resources\ExamPayments\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ExamPaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Payment Details')
                    ->columns(2)
                    ->schema([
                        Select::make('exam_registration_id')
                            ->label('Exam Registration')
                            ->relationship('examRegistration', 'id')
                            ->getOptionLabelFromRecordUsing(fn($record) => 'Reg #' . $record->id)
                            ->searchable()
                            ->preload()
                            ->required(),
                        TextInput::make('amount')
                            ->label('Amount')
                            ->numeric()
                            ->minValue(0)
                            ->required()
                            ->prefix('$'),
                        Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'completed' => 'Completed',
                                'failed' => 'Failed',
                                'refunded' => 'Refunded',
                            ])
                            ->required()
                            ->default('pending'),
                        DateTimePicker::make('paid_at')
                            ->label('Paid At')
                            ->native(false)
                            ->nullable(),
                        Select::make('payment_method')
                            ->options([
                                'mobile_money' => 'Mobile Money',
                                'card' => 'Card',
                                'bank_transfer' => 'Bank Transfer',
                                'cash' => 'Cash',
                            ])
                            ->nullable(),
                        TextInput::make('transaction_ref')
                            ->label('Transaction Reference')
                            ->maxLength(255)
                            ->nullable(),
                    ]),
            ]);
    }
}
