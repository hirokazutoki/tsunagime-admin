<?php

namespace App\Filament\Resources\VolunteerCenters\Pages;

use App\Filament\Resources\VolunteerCenters\VolunteerCenterResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewVolunteerCenter extends ViewRecord
{
    protected static string $resource = VolunteerCenterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
