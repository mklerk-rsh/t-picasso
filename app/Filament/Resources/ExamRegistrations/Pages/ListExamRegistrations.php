<?php

namespace App\Filament\Resources\ExamRegistrations\Pages;

use App\Filament\Resources\ExamRegistrations\ExamRegistrationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListExamRegistrations extends ListRecords
{
    protected static string $resource = ExamRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
