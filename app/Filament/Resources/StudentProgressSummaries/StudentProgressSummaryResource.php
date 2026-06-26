<?php

namespace App\Filament\Resources\StudentProgressSummaries;

use App\Filament\Resources\StudentProgressSummaries\Pages\CreateStudentProgressSummary;
use App\Filament\Resources\StudentProgressSummaries\Pages\EditStudentProgressSummary;
use App\Filament\Resources\StudentProgressSummaries\Pages\ListStudentProgressSummaries;
use App\Filament\Resources\StudentProgressSummaries\Schemas\StudentProgressSummaryForm;
use App\Filament\Resources\StudentProgressSummaries\Tables\StudentProgressSummariesTable;
use App\Models\StudentProgressSummary;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class StudentProgressSummaryResource extends Resource
{
    protected static ?string $model = StudentProgressSummary::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-chart-bar';

    protected static string | UnitEnum | null $navigationGroup = 'Enrollment Management';

    protected static ?string $navigationLabel = 'Progress Summaries';

    protected static ?int $navigationSort = 6;

    public static function form(Schema $schema): Schema
    {
        return StudentProgressSummaryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StudentProgressSummariesTable::configure($table);
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
            'index' => ListStudentProgressSummaries::route('/'),
            'create' => CreateStudentProgressSummary::route('/create'),
            'edit' => EditStudentProgressSummary::route('/{record}/edit'),
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
