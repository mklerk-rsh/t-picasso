<?php

namespace App\Filament\Resources\CourseSubjects;

use App\Filament\Resources\CourseSubjects\Pages\CreateCourseSubject;
use App\Filament\Resources\CourseSubjects\Pages\EditCourseSubject;
use App\Filament\Resources\CourseSubjects\Pages\ListCourseSubjects;
use App\Filament\Resources\CourseSubjects\Schemas\CourseSubjectForm;
use App\Filament\Resources\CourseSubjects\Tables\CourseSubjectsTable;
use App\Models\CourseSubject;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class CourseSubjectResource extends Resource
{
    protected static ?string $model = CourseSubject::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-link';

    protected static string | UnitEnum | null $navigationGroup = 'Curriculum Management';

    protected static ?string $navigationLabel = 'Course Subjects';

    protected static ?int $navigationSort = 7;

    public static function form(Schema $schema): Schema
    {
        return CourseSubjectForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CourseSubjectsTable::configure($table);
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
            'index' => ListCourseSubjects::route('/'),
            'create' => CreateCourseSubject::route('/create'),
            'edit' => EditCourseSubject::route('/{record}/edit'),
        ];
    }
}
