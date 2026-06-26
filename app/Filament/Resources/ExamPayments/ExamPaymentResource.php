<?php

namespace App\Filament\Resources\ExamPayments;

use App\Filament\Resources\ExamPayments\Pages\CreateExamPayment;
use App\Filament\Resources\ExamPayments\Pages\EditExamPayment;
use App\Filament\Resources\ExamPayments\Pages\ListExamPayments;
use App\Filament\Resources\ExamPayments\Schemas\ExamPaymentForm;
use App\Filament\Resources\ExamPayments\Tables\ExamPaymentsTable;
use App\Models\ExamPayment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class ExamPaymentResource extends Resource
{
    protected static ?string $model = ExamPayment::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-banknotes';

    protected static string | UnitEnum | null $navigationGroup = 'Examination Management';

    protected static ?string $navigationLabel = 'Exam Payments';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return ExamPaymentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExamPaymentsTable::configure($table);
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
            'index' => ListExamPayments::route('/'),
            'create' => CreateExamPayment::route('/create'),
            'edit' => EditExamPayment::route('/{record}/edit'),
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
