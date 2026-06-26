<?php

namespace App\Filament\Resources\ExamQuestions;

use App\Filament\Resources\ExamQuestions\Pages\CreateExamQuestion;
use App\Filament\Resources\ExamQuestions\Pages\EditExamQuestion;
use App\Filament\Resources\ExamQuestions\Pages\ListExamQuestions;
use App\Filament\Resources\ExamQuestions\Schemas\ExamQuestionForm;
use App\Filament\Resources\ExamQuestions\Tables\ExamQuestionsTable;
use App\Models\ExamQuestion;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class ExamQuestionResource extends Resource
{
    protected static ?string $model = ExamQuestion::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static string | UnitEnum | null $navigationGroup = 'Examination Management';

    protected static ?string $navigationLabel = 'Exam Questions';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return ExamQuestionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExamQuestionsTable::configure($table);
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
            'index' => ListExamQuestions::route('/'),
            'create' => CreateExamQuestion::route('/create'),
            'edit' => EditExamQuestion::route('/{record}/edit'),
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
