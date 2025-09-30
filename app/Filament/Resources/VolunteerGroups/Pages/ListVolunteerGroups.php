<?php

namespace App\Filament\Resources\VolunteerGroups\Pages;

use App\Filament\Resources\VolunteerGroups\VolunteerGroupResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListVolunteerGroups extends ListRecords
{
    protected static string $resource = VolunteerGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
