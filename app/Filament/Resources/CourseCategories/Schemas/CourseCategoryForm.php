<?php

namespace App\Filament\Resources\CourseCategories\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CourseCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Category Details')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull()
                            ->live(onBlur: true),
                        Textarea::make('description')
                            ->rows(3)
                            ->columnSpanFull(),
                        TextInput::make('icon')
                            ->maxLength(100)
                            ->placeholder('heroicon-o-academic-cap'),
                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ]),
            ]);
    }
}
