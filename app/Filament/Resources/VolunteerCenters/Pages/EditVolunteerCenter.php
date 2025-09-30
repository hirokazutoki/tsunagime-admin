<?php

namespace App\Filament\Resources\VolunteerCenters\Pages;

use App\Filament\Resources\VolunteerCenters\VolunteerCenterResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditVolunteerCenter extends EditRecord
{
    protected static string $resource = VolunteerCenterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
