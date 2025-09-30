<?php

namespace App\Filament\Resources\VolunteerGroups\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class VolunteerGroupInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('group_name'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
