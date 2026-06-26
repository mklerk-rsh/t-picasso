<?php

namespace App\Filament\Resources\ExamScorecards;

use App\Filament\Resources\ExamScorecards\Pages\CreateExamScorecard;
use App\Filament\Resources\ExamScorecards\Pages\EditExamScorecard;
use App\Filament\Resources\ExamScorecards\Pages\ListExamScorecards;
use App\Filament\Resources\ExamScorecards\Schemas\ExamScorecardForm;
use App\Filament\Resources\ExamScorecards\Tables\ExamScorecardsTable;
use App\Models\ExamScorecard;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class ExamScorecardResource extends Resource
{
    protected static ?string $model = ExamScorecard::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-document-chart-bar';

    protected static string | UnitEnum | null $navigationGroup = 'Examination Management';

    protected static ?string $navigationLabel = 'Scorecards';

    protected static ?int $navigationSort = 8;

    public static function form(Schema $schema): Schema
    {
        return ExamScorecardForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExamScorecardsTable::configure($table);
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
            'index' => ListExamScorecards::route('/'),
            'create' => CreateExamScorecard::route('/create'),
            'edit' => EditExamScorecard::route('/{record}/edit'),
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
