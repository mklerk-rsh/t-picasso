<?php

namespace App\Filament\Resources\GraduationRecords;

use App\Filament\Resources\GraduationRecords\Pages\CreateGraduationRecord;
use App\Filament\Resources\GraduationRecords\Pages\EditGraduationRecord;
use App\Filament\Resources\GraduationRecords\Pages\ListGraduationRecords;
use App\Filament\Resources\GraduationRecords\Schemas\GraduationRecordForm;
use App\Filament\Resources\GraduationRecords\Tables\GraduationRecordsTable;
use App\Models\GraduationRecord;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class GraduationRecordResource extends Resource
{
    protected static ?string $model = GraduationRecord::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::Star;

    protected static string | UnitEnum | null $navigationGroup = 'Certificate Management';

    protected static ?string $navigationLabel = 'Graduation Records';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return GraduationRecordForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GraduationRecordsTable::configure($table);
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
            'index' => ListGraduationRecords::route('/'),
            'create' => CreateGraduationRecord::route('/create'),
            'edit' => EditGraduationRecord::route('/{record}/edit'),
        ];
    }
}
