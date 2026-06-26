<?php

namespace App\Filament\Resources\EnrollmentTracking\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EnrollmentTrackingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Tracking Details')
                    ->columns(2)
                    ->schema([
                        Select::make('enrollment_id')
                            ->label('Enrollment')
                            ->relationship('enrollment', 'id')
                            ->getOptionLabelFromRecordUsing(fn($record) => 'Enroll #' . $record->id . ' - ' . ($record->student?->user?->name ?? '') . ' -> ' . ($record->course?->title ?? ''))
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('from_status')
                            ->label('From Status')
                            ->options([
                                'active' => 'Active',
                                'completed' => 'Completed',
                                'dropped' => 'Dropped',
                                'withdrawn' => 'Withdrawn',
                                'paused' => 'Paused',
                            ])
                            ->nullable(),
                        Select::make('to_status')
                            ->label('To Status')
                            ->options([
                                'active' => 'Active',
                                'completed' => 'Completed',
                                'dropped' => 'Dropped',
                                'withdrawn' => 'Withdrawn',
                                'paused' => 'Paused',
                            ])
                            ->required(),
                        Select::make('changed_by')
                            ->label('Changed By')
                            ->relationship('changedBy', 'name')
                            ->searchable()
                            ->preload()
                            ->nullable(),
                        Textarea::make('reason')
                            ->label('Reason')
                            ->columnSpanFull()
                            ->nullable()
                            ->rows(3),
                    ]),
            ]);
    }
}
