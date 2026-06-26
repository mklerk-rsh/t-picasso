<?php

namespace App\Filament\Resources\EnrollmentTracking;

use App\Filament\Resources\EnrollmentTracking\Pages\CreateEnrollmentTracking;
use App\Filament\Resources\EnrollmentTracking\Pages\EditEnrollmentTracking;
use App\Filament\Resources\EnrollmentTracking\Pages\ListEnrollmentTrackings;
use App\Filament\Resources\EnrollmentTracking\Schemas\EnrollmentTrackingForm;
use App\Filament\Resources\EnrollmentTracking\Tables\EnrollmentTrackingsTable;
use App\Models\EnrollmentTracking;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class EnrollmentTrackingResource extends Resource
{
    protected static ?string $model = EnrollmentTracking::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-clock';

    protected static string | UnitEnum | null $navigationGroup = 'Enrollment Management';

    protected static ?string $navigationLabel = 'Enrollment Tracking';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return EnrollmentTrackingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EnrollmentTrackingsTable::configure($table);
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
            'index' => ListEnrollmentTrackings::route('/'),
            'create' => CreateEnrollmentTracking::route('/create'),
            'edit' => EditEnrollmentTracking::route('/{record}/edit'),
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
