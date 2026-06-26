<?php

namespace App\Filament\Resources\TopicProgress\Pages;

use App\Filament\Resources\TopicProgress\TopicProgressResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTopicProgress extends ListRecords
{
    protected static string $resource = TopicProgressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
