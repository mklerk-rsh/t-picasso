<?php

namespace App\Filament\Resources\SubTopics;

use App\Filament\Resources\SubTopics\Pages\CreateSubTopic;
use App\Filament\Resources\SubTopics\Pages\EditSubTopic;
use App\Filament\Resources\SubTopics\Pages\ListSubTopics;
use App\Filament\Resources\SubTopics\Schemas\SubTopicForm;
use App\Filament\Resources\SubTopics\Tables\SubTopicsTable;
use App\Models\SubTopic;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class SubTopicResource extends Resource
{
    protected static ?string $model = SubTopic::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-list-bullet';

    protected static string | UnitEnum | null $navigationGroup = 'Curriculum Management';

    protected static ?string $navigationLabel = 'Sub Topics';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return SubTopicForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SubTopicsTable::configure($table);
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
            'index' => ListSubTopics::route('/'),
            'create' => CreateSubTopic::route('/create'),
            'edit' => EditSubTopic::route('/{record}/edit'),
        ];
    }
}
