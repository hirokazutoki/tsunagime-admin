<?php

namespace App\Filament\Resources\CenterStaff\Pages;

use App\Filament\Resources\CenterStaff\CenterStaffResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCenterStaff extends ListRecords
{
    protected static string $resource = CenterStaffResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
