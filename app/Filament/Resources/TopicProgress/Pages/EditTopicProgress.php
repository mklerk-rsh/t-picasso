<?php

namespace App\Filament\Resources\TopicProgress\Pages;

use App\Filament\Resources\TopicProgress\TopicProgressResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTopicProgress extends EditRecord
{
    protected static string $resource = TopicProgressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
