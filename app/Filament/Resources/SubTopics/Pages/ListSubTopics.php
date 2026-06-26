<?php

namespace App\Filament\Resources\SubTopics\Pages;

use App\Filament\Resources\SubTopics\SubTopicResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSubTopics extends ListRecords
{
    protected static string $resource = SubTopicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
