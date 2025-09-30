<?php

namespace App\Filament\Resources\CenterStaff\Pages;

use App\Filament\Resources\CenterStaff\CenterStaffResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCenterStaff extends EditRecord
{
    protected static string $resource = CenterStaffResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
