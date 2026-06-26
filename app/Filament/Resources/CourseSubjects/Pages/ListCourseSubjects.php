<?php

namespace App\Filament\Resources\CourseSubjects\Pages;

use App\Filament\Resources\CourseSubjects\CourseSubjectResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCourseSubjects extends ListRecords
{
    protected static string $resource = CourseSubjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
