<?php

namespace App\Filament\Resources\CertificateVerifications;

use App\Filament\Resources\CertificateVerifications\Pages\CreateCertificateVerification;
use App\Filament\Resources\CertificateVerifications\Pages\EditCertificateVerification;
use App\Filament\Resources\CertificateVerifications\Pages\ListCertificateVerifications;
use App\Filament\Resources\CertificateVerifications\Schemas\CertificateVerificationForm;
use App\Filament\Resources\CertificateVerifications\Tables\CertificateVerificationsTable;
use App\Models\CertificateVerification;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class CertificateVerificationResource extends Resource
{
    protected static ?string $model = CertificateVerification::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::CheckBadge;

    protected static string | UnitEnum | null $navigationGroup = 'Certificate Management';

    protected static ?string $navigationLabel = 'Certificate Verifications';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return CertificateVerificationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CertificateVerificationsTable::configure($table);
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
            'index' => ListCertificateVerifications::route('/'),
            'create' => CreateCertificateVerification::route('/create'),
            'edit' => EditCertificateVerification::route('/{record}/edit'),
        ];
    }
}
