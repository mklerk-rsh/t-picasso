<?php

namespace App\Filament\Resources\PaypalTransactions;

use App\Filament\Resources\PaypalTransactions\Pages\CreatePaypalTransaction;
use App\Filament\Resources\PaypalTransactions\Pages\EditPaypalTransaction;
use App\Filament\Resources\PaypalTransactions\Pages\ListPaypalTransactions;
use App\Filament\Resources\PaypalTransactions\Schemas\PaypalTransactionForm;
use App\Filament\Resources\PaypalTransactions\Tables\PaypalTransactionsTable;
use App\Models\PaypalTransaction;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PaypalTransactionResource extends Resource
{
    protected static ?string $model = PaypalTransaction::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::GlobeAlt;

    protected static string | UnitEnum | null $navigationGroup = 'Payment Management';

    protected static ?string $navigationLabel = 'PayPal Transactions';

    protected static ?int $navigationSort = 8;

    public static function form(Schema $schema): Schema
    {
        return PaypalTransactionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PaypalTransactionsTable::configure($table);
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
            'index' => ListPaypalTransactions::route('/'),
            'create' => CreatePaypalTransaction::route('/create'),
            'edit' => EditPaypalTransaction::route('/{record}/edit'),
        ];
    }
}
