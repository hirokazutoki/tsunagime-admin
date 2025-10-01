<?php

namespace App\Filament\Resources\VolunteerActivities\Pages;

use App\Filament\Resources\VolunteerActivities\VolunteerActivityResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewVolunteerActivity extends ViewRecord
{
    protected static string $resource = VolunteerActivityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
