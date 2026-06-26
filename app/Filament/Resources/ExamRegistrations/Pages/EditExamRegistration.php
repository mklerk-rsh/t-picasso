<?php

namespace App\Filament\Resources\ExamRegistrations\Pages;

use App\Filament\Resources\ExamRegistrations\ExamRegistrationResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditExamRegistration extends EditRecord
{
    protected static string $resource = ExamRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
