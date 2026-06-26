<?php

namespace App\Filament\Resources\CoursePayments\Schemas;

use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CoursePaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Course Payment Details')
                    ->columns(2)
                    ->schema([
                        Select::make('payment_id')
                            ->label('Payment')
                            ->relationship('payment', 'id')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('enrollment_id')
                            ->label('Enrollment')
                            ->relationship('enrollment', 'id')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('course_id')
                            ->label('Course')
                            ->relationship('course', 'title')
                            ->searchable()
                            ->preload()
                            ->required(),
                    ]),
            ]);
    }
}
