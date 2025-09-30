<?php

namespace App\Filament\Resources\CenterStaff\Pages;

use App\Filament\Resources\CenterStaff\CenterStaffResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCenterStaff extends ViewRecord
{
    protected static string $resource = CenterStaffResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
