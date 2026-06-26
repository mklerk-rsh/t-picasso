<?php

namespace App\Filament\Resources\ExamAnswers;

use App\Filament\Resources\ExamAnswers\Pages\CreateExamAnswer;
use App\Filament\Resources\ExamAnswers\Pages\EditExamAnswer;
use App\Filament\Resources\ExamAnswers\Pages\ListExamAnswers;
use App\Filament\Resources\ExamAnswers\Schemas\ExamAnswerForm;
use App\Filament\Resources\ExamAnswers\Tables\ExamAnswersTable;
use App\Models\ExamAnswer;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class ExamAnswerResource extends Resource
{
    protected static ?string $model = ExamAnswer::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-pencil-square';

    protected static string | UnitEnum | null $navigationGroup = 'Examination Management';

    protected static ?string $navigationLabel = 'Exam Answers';

    protected static ?int $navigationSort = 6;

    public static function form(Schema $schema): Schema
    {
        return ExamAnswerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExamAnswersTable::configure($table);
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
            'index' => ListExamAnswers::route('/'),
            'create' => CreateExamAnswer::route('/create'),
            'edit' => EditExamAnswer::route('/{record}/edit'),
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
