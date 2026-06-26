<?php

namespace App\Filament\Resources\PaymentAttempts;

use App\Filament\Resources\PaymentAttempts\Pages\CreatePaymentAttempt;
use App\Filament\Resources\PaymentAttempts\Pages\EditPaymentAttempt;
use App\Filament\Resources\PaymentAttempts\Pages\ListPaymentAttempts;
use App\Filament\Resources\PaymentAttempts\Schemas\PaymentAttemptForm;
use App\Filament\Resources\PaymentAttempts\Tables\PaymentAttemptsTable;
use App\Models\PaymentAttempt;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PaymentAttemptResource extends Resource
{
    protected static ?string $model = PaymentAttempt::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::ArrowPath;

    protected static string | UnitEnum | null $navigationGroup = 'Payment Management';

    protected static ?string $navigationLabel = 'Payment Attempts';

    protected static ?int $navigationSort = 9;

    public static function form(Schema $schema): Schema
    {
        return PaymentAttemptForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PaymentAttemptsTable::configure($table);
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
            'index' => ListPaymentAttempts::route('/'),
            'create' => CreatePaymentAttempt::route('/create'),
            'edit' => EditPaymentAttempt::route('/{record}/edit'),
        ];
    }
}
