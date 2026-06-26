<?php

namespace App\Filament\Resources\PaymentWebhooks\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PaymentWebhookForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Webhook Details')
                    ->columns(2)
                    ->schema([
                        Select::make('gateway')
                            ->options([
                                'mpesa' => 'M-Pesa',
                                'paypal' => 'PayPal',
                            ])
                            ->required(),
                        Select::make('status')
                            ->options([
                                'received' => 'Received',
                                'processed' => 'Processed',
                                'failed' => 'Failed',
                            ])
                            ->default('received'),
                        DateTimePicker::make('processed_at'),
                        Textarea::make('payload')
                            ->columnSpanFull()
                            ->rows(4),
                        Textarea::make('headers')
                            ->columnSpanFull()
                            ->rows(3),
                    ]),
            ]);
    }
}
