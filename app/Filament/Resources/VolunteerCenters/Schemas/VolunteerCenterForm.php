<?php

namespace App\Filament\Resources\VolunteerCenters\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class VolunteerCenterForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('center_name')
                    ->required(),
                DateTimePicker::make('opened_at')
                    ->required(),
                TextInput::make('address')
                    ->required(),
                TextInput::make('longitude'),
                TextInput::make('latitude'),
            ]);
    }
}
