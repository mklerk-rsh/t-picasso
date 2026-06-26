<?php

namespace App\Filament\Resources\SubTopics\Pages;

use App\Filament\Resources\SubTopics\SubTopicResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSubTopic extends EditRecord
{
    protected static string $resource = SubTopicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
