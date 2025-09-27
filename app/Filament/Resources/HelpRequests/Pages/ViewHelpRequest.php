<?php

namespace App\Filament\Resources\HelpRequests\Pages;

use App\Filament\Resources\HelpRequests\HelpRequestResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewHelpRequest extends ViewRecord
{
    protected static string $resource = HelpRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
