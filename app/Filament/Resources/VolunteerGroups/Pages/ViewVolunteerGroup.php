<?php

namespace App\Filament\Resources\VolunteerGroups\Pages;

use App\Filament\Resources\VolunteerGroups\VolunteerGroupResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewVolunteerGroup extends ViewRecord
{
    protected static string $resource = VolunteerGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
