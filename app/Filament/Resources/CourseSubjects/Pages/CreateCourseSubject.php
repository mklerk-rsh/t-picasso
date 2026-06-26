<?php

namespace App\Filament\Resources\CourseSubjects\Pages;

use App\Filament\Resources\CourseSubjects\CourseSubjectResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCourseSubject extends CreateRecord
{
    protected static string $resource = CourseSubjectResource::class;
}
