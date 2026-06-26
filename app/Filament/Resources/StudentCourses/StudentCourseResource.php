<?php

namespace App\Filament\Resources\StudentCourses;

use App\Filament\Resources\StudentCourses\Pages\CreateStudentCourse;
use App\Filament\Resources\StudentCourses\Pages\EditStudentCourse;
use App\Filament\Resources\StudentCourses\Pages\ListStudentCourses;
use App\Filament\Resources\StudentCourses\Schemas\StudentCourseForm;
use App\Filament\Resources\StudentCourses\Tables\StudentCoursesTable;
use App\Models\StudentCourse;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class StudentCourseResource extends Resource
{
    protected static ?string $model = StudentCourse::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-book-open';

    protected static string | UnitEnum | null $navigationGroup = 'Enrollment Management';

    protected static ?string $navigationLabel = 'Student Courses';

    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return StudentCourseForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StudentCoursesTable::configure($table);
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
            'index' => ListStudentCourses::route('/'),
            'create' => CreateStudentCourse::route('/create'),
            'edit' => EditStudentCourse::route('/{record}/edit'),
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
