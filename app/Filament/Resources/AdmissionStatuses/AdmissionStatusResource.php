<?php

namespace App\Filament\Resources\AdmissionStatuses;

use App\Filament\Resources\AdmissionStatuses\Pages\CreateAdmissionStatus;
use App\Filament\Resources\AdmissionStatuses\Pages\EditAdmissionStatus;
use App\Filament\Resources\AdmissionStatuses\Pages\ListAdmissionStatuses;
use App\Filament\Resources\AdmissionStatuses\Schemas\AdmissionStatusForm;
use App\Filament\Resources\AdmissionStatuses\Tables\AdmissionStatusesTable;
use App\Models\AdmissionStatus;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class AdmissionStatusResource extends Resource
{
    protected static ?string $model = AdmissionStatus::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-arrow-path';

    protected static string | UnitEnum | null $navigationGroup = 'Enrollment Management';

    protected static ?string $navigationLabel = 'Admission Statuses';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return AdmissionStatusForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AdmissionStatusesTable::configure($table);
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
            'index' => ListAdmissionStatuses::route('/'),
            'create' => CreateAdmissionStatus::route('/create'),
            'edit' => EditAdmissionStatus::route('/{record}/edit'),
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
