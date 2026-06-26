<?php

namespace App\Filament\Resources\CoursePayments;

use App\Filament\Resources\CoursePayments\Pages\CreateCoursePayment;
use App\Filament\Resources\CoursePayments\Pages\EditCoursePayment;
use App\Filament\Resources\CoursePayments\Pages\ListCoursePayments;
use App\Filament\Resources\CoursePayments\Schemas\CoursePaymentForm;
use App\Filament\Resources\CoursePayments\Tables\CoursePaymentsTable;
use App\Models\CoursePayment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class CoursePaymentResource extends Resource
{
    protected static ?string $model = CoursePayment::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::AcademicCap;

    protected static string | UnitEnum | null $navigationGroup = 'Payment Management';

    protected static ?string $navigationLabel = 'Course Payments';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return CoursePaymentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CoursePaymentsTable::configure($table);
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
            'index' => ListCoursePayments::route('/'),
            'create' => CreateCoursePayment::route('/create'),
            'edit' => EditCoursePayment::route('/{record}/edit'),
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
