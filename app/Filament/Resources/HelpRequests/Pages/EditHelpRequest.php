<?php

namespace App\Filament\Resources\HelpRequests\Pages;

use App\Filament\Resources\HelpRequests\HelpRequestResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditHelpRequest extends EditRecord
{
    protected static string $resource = HelpRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
