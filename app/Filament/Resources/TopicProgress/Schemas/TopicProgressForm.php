<?php

namespace App\Filament\Resources\TopicProgress\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TopicProgressForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Progress Details')
                    ->columns(2)
                    ->schema([
                        Select::make('student_id')
                            ->label('Student')
                            ->relationship('student', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('topic_id')
                            ->label('Topic')
                            ->relationship('topic', 'title')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('status')
                            ->options([
                                'not_started' => 'Not Started',
                                'in_progress' => 'In Progress',
                                'completed' => 'Completed',
                            ])
                            ->required()
                            ->default('not_started'),
                        TextInput::make('score')
                            ->numeric()
                            ->step(0.1)
                            ->minValue(0)
                            ->maxValue(100),
                        DateTimePicker::make('completed_at')
                            ->label('Completed At')
                            ->native(false),
                    ]),
            ]);
    }
}
