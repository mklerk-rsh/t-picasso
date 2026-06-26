<?php

namespace App\Filament\Resources\AdmissionStatuses\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AdmissionStatusForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Status Change')
                    ->columns(2)
                    ->schema([
                        Select::make('course_application_id')
                            ->label('Course Application')
                            ->relationship('courseApplication', 'id')
                            ->getOptionLabelFromRecordUsing(fn($record) => 'App #' . $record->id . ' - ' . ($record->student?->user?->name ?? 'N/A'))
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('from_status')
                            ->label('From Status')
                            ->options([
                                'pending' => 'Pending',
                                'approved' => 'Approved',
                                'rejected' => 'Rejected',
                                'waitlisted' => 'Waitlisted',
                            ])
                            ->nullable(),
                        Select::make('to_status')
                            ->label('To Status')
                            ->options([
                                'pending' => 'Pending',
                                'approved' => 'Approved',
                                'rejected' => 'Rejected',
                                'waitlisted' => 'Waitlisted',
                            ])
                            ->required(),
                        Select::make('changed_by')
                            ->label('Changed By')
                            ->relationship('changedBy', 'name')
                            ->searchable()
                            ->preload()
                            ->nullable(),
                        Textarea::make('remarks')
                            ->label('Remarks')
                            ->columnSpanFull()
                            ->nullable()
                            ->rows(3),
                    ]),
            ]);
    }
}
