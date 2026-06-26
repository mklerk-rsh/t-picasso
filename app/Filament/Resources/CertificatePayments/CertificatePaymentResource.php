<?php

namespace App\Filament\Resources\CertificatePayments;

use App\Filament\Resources\CertificatePayments\Pages\CreateCertificatePayment;
use App\Filament\Resources\CertificatePayments\Pages\EditCertificatePayment;
use App\Filament\Resources\CertificatePayments\Pages\ListCertificatePayments;
use App\Filament\Resources\CertificatePayments\Schemas\CertificatePaymentForm;
use App\Filament\Resources\CertificatePayments\Tables\CertificatePaymentsTable;
use App\Models\CertificatePayment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class CertificatePaymentResource extends Resource
{
    protected static ?string $model = CertificatePayment::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::DocumentText;

    protected static string | UnitEnum | null $navigationGroup = 'Payment Management';

    protected static ?string $navigationLabel = 'Certificate Payments';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return CertificatePaymentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CertificatePaymentsTable::configure($table);
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
            'index' => ListCertificatePayments::route('/'),
            'create' => CreateCertificatePayment::route('/create'),
            'edit' => EditCertificatePayment::route('/{record}/edit'),
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
