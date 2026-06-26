<?php

namespace App\Filament\Resources\StudentCourses\Pages;

use App\Filament\Resources\StudentCourses\StudentCourseResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditStudentCourse extends EditRecord
{
    protected static string $resource = StudentCourseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
