<?php

namespace App\Filament\Resources\HelpRequests\Pages;

use App\Filament\Resources\HelpRequests\HelpRequestResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHelpRequests extends ListRecords
{
    protected static string $resource = HelpRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
