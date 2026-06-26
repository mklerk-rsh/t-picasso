<?php

namespace App\Filament\Resources\ExamResults;

use App\Filament\Resources\ExamResults\Pages\CreateExamResult;
use App\Filament\Resources\ExamResults\Pages\EditExamResult;
use App\Filament\Resources\ExamResults\Pages\ListExamResults;
use App\Filament\Resources\ExamResults\Schemas\ExamResultForm;
use App\Filament\Resources\ExamResults\Tables\ExamResultsTable;
use App\Models\ExamResult;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class ExamResultResource extends Resource
{
    protected static ?string $model = ExamResult::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-chart-bar-square';

    protected static string | UnitEnum | null $navigationGroup = 'Examination Management';

    protected static ?string $navigationLabel = 'Exam Results';

    protected static ?int $navigationSort = 7;

    public static function form(Schema $schema): Schema
    {
        return ExamResultForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExamResultsTable::configure($table);
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
            'index' => ListExamResults::route('/'),
            'create' => CreateExamResult::route('/create'),
            'edit' => EditExamResult::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
