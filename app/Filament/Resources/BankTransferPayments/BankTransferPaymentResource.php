<?php

namespace App\Filament\Resources\BankTransferPayments;

use App\Filament\Resources\BankTransferPayments\Pages\CreateBankTransferPayment;
use App\Filament\Resources\BankTransferPayments\Pages\EditBankTransferPayment;
use App\Filament\Resources\BankTransferPayments\Pages\ListBankTransferPayments;
use App\Filament\Resources\BankTransferPayments\Schemas\BankTransferPaymentForm;
use App\Filament\Resources\BankTransferPayments\Tables\BankTransferPaymentsTable;
use App\Models\BankTransferPayment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class BankTransferPaymentResource extends Resource
{
    protected static ?string $model = BankTransferPayment::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::Banknotes;

    protected static string | UnitEnum | null $navigationGroup = 'Banking Management';

    protected static ?string $navigationLabel = 'Bank Transfer Payments';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return BankTransferPaymentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BankTransferPaymentsTable::configure($table);
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
            'index' => ListBankTransferPayments::route('/'),
            'create' => CreateBankTransferPayment::route('/create'),
            'edit' => EditBankTransferPayment::route('/{record}/edit'),
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
