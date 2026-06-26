<?php

namespace App\Filament\Resources\TopicPayments;

use App\Filament\Resources\TopicPayments\Pages\CreateTopicPayment;
use App\Filament\Resources\TopicPayments\Pages\EditTopicPayment;
use App\Filament\Resources\TopicPayments\Pages\ListTopicPayments;
use App\Filament\Resources\TopicPayments\Schemas\TopicPaymentForm;
use App\Filament\Resources\TopicPayments\Tables\TopicPaymentsTable;
use App\Models\TopicPayment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class TopicPaymentResource extends Resource
{
    protected static ?string $model = TopicPayment::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::BookOpen;

    protected static string | UnitEnum | null $navigationGroup = 'Payment Management';

    protected static ?string $navigationLabel = 'Topic Payments';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return TopicPaymentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TopicPaymentsTable::configure($table);
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
            'index' => ListTopicPayments::route('/'),
            'create' => CreateTopicPayment::route('/create'),
            'edit' => EditTopicPayment::route('/{record}/edit'),
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
