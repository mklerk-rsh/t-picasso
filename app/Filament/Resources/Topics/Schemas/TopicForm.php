<?php

namespace App\Filament\Resources\Topics\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TopicForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Topic Details')
                    ->columns(2)
                    ->schema([
                        Select::make('module_id')
                            ->label('Module')
                            ->relationship('module', 'title')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull()
                            ->live(onBlur: true),
                        Select::make('type')
                            ->options([
                                'teacher-led' => 'Teacher Led',
                                'self-study' => 'Self Study',
                                'paid' => 'Paid',
                                'free' => 'Free',
                            ])
                            ->required()
                            ->default('teacher-led'),
                        TextInput::make('duration_minutes')
                            ->label('Duration (minutes)')
                            ->numeric()
                            ->minValue(1),
                        TextInput::make('order')
                            ->numeric()
                            ->default(0),
                        TextInput::make('video_url')
                            ->label('Video URL')
                            ->url()
                            ->maxLength(255),
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                        RichEditor::make('content')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
