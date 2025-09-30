<?php

namespace App\Filament\Resources\VolunteerGroups\Pages;

use App\Filament\Resources\VolunteerGroups\VolunteerGroupResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditVolunteerGroup extends EditRecord
{
    protected static string $resource = VolunteerGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
