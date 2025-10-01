<?php

namespace App\Filament\Resources\VolunteerActivities\Pages;

use App\Filament\Resources\VolunteerActivities\VolunteerActivityResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditVolunteerActivity extends EditRecord
{
    protected static string $resource = VolunteerActivityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
