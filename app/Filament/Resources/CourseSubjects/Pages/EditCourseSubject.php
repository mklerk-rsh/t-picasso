<?php

namespace App\Filament\Resources\CourseSubjects\Pages;

use App\Filament\Resources\CourseSubjects\CourseSubjectResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCourseSubject extends EditRecord
{
    protected static string $resource = CourseSubjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
