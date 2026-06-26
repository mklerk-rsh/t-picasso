<?php

namespace App\Filament\Resources\TopicProgress;

use App\Filament\Resources\TopicProgress\Pages\CreateTopicProgress;
use App\Filament\Resources\TopicProgress\Pages\EditTopicProgress;
use App\Filament\Resources\TopicProgress\Pages\ListTopicProgress;
use App\Filament\Resources\TopicProgress\Schemas\TopicProgressForm;
use App\Filament\Resources\TopicProgress\Tables\TopicProgressTable;
use App\Models\TopicProgress;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class TopicProgressResource extends Resource
{
    protected static ?string $model = TopicProgress::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-chart-bar';

    protected static string | UnitEnum | null $navigationGroup = 'Curriculum Management';

    protected static ?string $navigationLabel = 'Topic Progress';

    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return TopicProgressForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TopicProgressTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTopicProgress::route('/'),
            'create' => CreateTopicProgress::route('/create'),
            'edit' => EditTopicProgress::route('/{record}/edit'),
        ];
    }
}
