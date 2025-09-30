<?php

namespace App\Filament\Resources\VolunteerCenters\Pages;

use App\Filament\Resources\VolunteerCenters\VolunteerCenterResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListVolunteerCenters extends ListRecords
{
    protected static string $resource = VolunteerCenterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
