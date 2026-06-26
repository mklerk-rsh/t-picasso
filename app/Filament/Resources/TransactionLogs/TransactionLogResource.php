<?php

namespace App\Filament\Resources\TransactionLogs;

use App\Filament\Resources\TransactionLogs\Pages\CreateTransactionLog;
use App\Filament\Resources\TransactionLogs\Pages\EditTransactionLog;
use App\Filament\Resources\TransactionLogs\Pages\ListTransactionLogs;
use App\Filament\Resources\TransactionLogs\Schemas\TransactionLogForm;
use App\Filament\Resources\TransactionLogs\Tables\TransactionLogsTable;
use App\Models\TransactionLog;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class TransactionLogResource extends Resource
{
    protected static ?string $model = TransactionLog::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::ClipboardDocumentList;

    protected static string | UnitEnum | null $navigationGroup = 'Payment Management';

    protected static ?string $navigationLabel = 'Transaction Logs';

    protected static ?int $navigationSort = 6;

    public static function form(Schema $schema): Schema
    {
        return TransactionLogForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TransactionLogsTable::configure($table);
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
            'index' => ListTransactionLogs::route('/'),
            'create' => CreateTransactionLog::route('/create'),
            'edit' => EditTransactionLog::route('/{record}/edit'),
        ];
    }
}
