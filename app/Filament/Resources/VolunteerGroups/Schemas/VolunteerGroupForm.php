<?php

namespace App\Filament\Resources\VolunteerGroups\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class VolunteerGroupForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('group_name')
                    ->required(),
            ]);
    }
}
