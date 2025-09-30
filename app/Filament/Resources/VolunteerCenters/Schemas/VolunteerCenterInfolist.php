<?php

namespace App\Filament\Resources\VolunteerCenters\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class VolunteerCenterInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('center_name'),
                TextEntry::make('opened_at')
                    ->dateTime(),
                TextEntry::make('address'),
                TextEntry::make('longitude')
                    ->placeholder('-'),
                TextEntry::make('latitude')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
