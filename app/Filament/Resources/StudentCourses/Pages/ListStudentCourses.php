<?php

namespace App\Filament\Resources\StudentCourses\Pages;

use App\Filament\Resources\StudentCourses\StudentCourseResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListStudentCourses extends ListRecords
{
    protected static string $resource = StudentCourseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
