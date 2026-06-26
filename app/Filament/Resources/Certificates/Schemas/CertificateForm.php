<?php

namespace App\Filament\Resources\Certificates\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CertificateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Certificate Details')
                    ->columns(2)
                    ->schema([
                        Select::make('student_id')
                            ->relationship('student.user', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('enrollment_id')
                            ->relationship('enrollment', 'id')
                            ->searchable()
                            ->preload()
                            ->nullable(),
                        Select::make('certificate_template_id')
                            ->relationship('template', 'name')
                            ->searchable()
                            ->preload()
                            ->nullable(),
                        TextInput::make('certificate_number')
                            ->maxLength(255)
                            ->nullable()
                            ->helperText('Auto-generated if left blank'),
                        Select::make('type')
                            ->options([
                                'course_completion' => 'Course Completion',
                                'graduation' => 'Graduation',
                            ])
                            ->required(),
                        TextInput::make('title')
                            ->maxLength(255)
                            ->required(),
                        Textarea::make('description')
                            ->nullable(),
                        Select::make('status')
                            ->options([
                                'draft' => 'Draft',
                                'issued' => 'Issued',
                                'revoked' => 'Revoked',
                            ])
                            ->required()
                            ->default('draft'),
                        DateTimePicker::make('issued_at')
                            ->nullable(),
                        DateTimePicker::make('expires_at')
                            ->nullable(),
                    ]),
            ]);
    }
}
