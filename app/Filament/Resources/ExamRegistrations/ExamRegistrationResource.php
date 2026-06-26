<?php

namespace App\Filament\Resources\ExamRegistrations;

use App\Filament\Resources\ExamRegistrations\Pages\CreateExamRegistration;
use App\Filament\Resources\ExamRegistrations\Pages\EditExamRegistration;
use App\Filament\Resources\ExamRegistrations\Pages\ListExamRegistrations;
use App\Filament\Resources\ExamRegistrations\Schemas\ExamRegistrationForm;
use App\Filament\Resources\ExamRegistrations\Tables\ExamRegistrationsTable;
use App\Models\ExamRegistration;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class ExamRegistrationResource extends Resource
{
    protected static ?string $model = ExamRegistration::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-document-text';

    protected static string | UnitEnum | null $navigationGroup = 'Examination Management';

    protected static ?string $navigationLabel = 'Exam Registrations';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return ExamRegistrationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExamRegistrationsTable::configure($table);
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
            'index' => ListExamRegistrations::route('/'),
            'create' => CreateExamRegistration::route('/create'),
            'edit' => EditExamRegistration::route('/{record}/edit'),
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
