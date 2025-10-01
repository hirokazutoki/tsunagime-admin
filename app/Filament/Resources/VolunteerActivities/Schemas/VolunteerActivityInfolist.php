<?php

namespace App\Filament\Resources\VolunteerActivities\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class VolunteerActivityInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('help_request_id')
                    ->numeric(),
                TextEntry::make('volunteerGroup.id')
                    ->label('Volunteer group'),
                TextEntry::make('activity_date')
                    ->date(),
                TextEntry::make('process_status')
                    ->badge(),
                TextEntry::make('activity_record')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('next_activity_note')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
