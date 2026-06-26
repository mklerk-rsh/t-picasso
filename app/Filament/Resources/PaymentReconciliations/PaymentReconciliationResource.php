<?php

namespace App\Filament\Resources\PaymentReconciliations;

use App\Filament\Resources\PaymentReconciliations\Pages\CreatePaymentReconciliation;
use App\Filament\Resources\PaymentReconciliations\Pages\EditPaymentReconciliation;
use App\Filament\Resources\PaymentReconciliations\Pages\ListPaymentReconciliations;
use App\Filament\Resources\PaymentReconciliations\Schemas\PaymentReconciliationForm;
use App\Filament\Resources\PaymentReconciliations\Tables\PaymentReconciliationsTable;
use App\Models\PaymentReconciliation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PaymentReconciliationResource extends Resource
{
    protected static ?string $model = PaymentReconciliation::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::ArrowsRightLeft;

    protected static string | UnitEnum | null $navigationGroup = 'Payment Management';

    protected static ?string $navigationLabel = 'Payment Reconciliations';

    protected static ?int $navigationSort = 11;

    public static function form(Schema $schema): Schema
    {
        return PaymentReconciliationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PaymentReconciliationsTable::configure($table);
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
            'index' => ListPaymentReconciliations::route('/'),
            'create' => CreatePaymentReconciliation::route('/create'),
            'edit' => EditPaymentReconciliation::route('/{record}/edit'),
        ];
    }
}
