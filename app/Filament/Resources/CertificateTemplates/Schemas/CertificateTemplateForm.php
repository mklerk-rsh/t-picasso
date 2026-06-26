<?php

namespace App\Filament\Resources\CertificateTemplates\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CertificateTemplateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Template Details')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull()
                            ->live(onBlur: true),
                        Select::make('type')
                            ->options([
                                'certificate' => 'Certificate',
                                'diploma' => 'Diploma',
                                'degree' => 'Degree',
                            ])
                            ->required()
                            ->default('certificate'),
                        Textarea::make('description')
                            ->columnSpanFull(),
                        TextInput::make('background_image')
                            ->maxLength(255),
                        TextInput::make('font_family')
                            ->maxLength(255),
                        Textarea::make('layout_config')
                            ->label('Layout Config (JSON)')
                            ->json()
                            ->columnSpanFull(),
                        Textarea::make('placeholders')
                            ->label('Placeholders (JSON)')
                            ->json()
                            ->columnSpanFull(),
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ]),
            ]);
    }
}
