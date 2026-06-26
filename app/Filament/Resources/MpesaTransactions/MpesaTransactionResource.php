<?php

namespace App\Filament\Resources\MpesaTransactions;

use App\Filament\Resources\MpesaTransactions\Pages\CreateMpesaTransaction;
use App\Filament\Resources\MpesaTransactions\Pages\EditMpesaTransaction;
use App\Filament\Resources\MpesaTransactions\Pages\ListMpesaTransactions;
use App\Filament\Resources\MpesaTransactions\Schemas\MpesaTransactionForm;
use App\Filament\Resources\MpesaTransactions\Tables\MpesaTransactionsTable;
use App\Models\MpesaTransaction;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class MpesaTransactionResource extends Resource
{
    protected static ?string $model = MpesaTransaction::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::DevicePhoneMobile;

    protected static string | UnitEnum | null $navigationGroup = 'Payment Management';

    protected static ?string $navigationLabel = 'M-Pesa Transactions';

    protected static ?int $navigationSort = 7;

    public static function form(Schema $schema): Schema
    {
        return MpesaTransactionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MpesaTransactionsTable::configure($table);
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
            'index' => ListMpesaTransactions::route('/'),
            'create' => CreateMpesaTransaction::route('/create'),
            'edit' => EditMpesaTransaction::route('/{record}/edit'),
        ];
    }
}
