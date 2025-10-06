<?php

namespace App\Filament\Resources\HelpRequests\Schemas;

use Dotswan\MapPicker\Fields\Map;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

class HelpRequestForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Map::make('location')
                    ->label('Location')
                    ->columnSpanFull()
                    // Basic Configuration
                    ->defaultLocation(latitude: 40.4168, longitude: -3.7038)
                    ->draggable(true)
                    ->clickable(true) // click to move marker
                    ->zoom(15)
                    ->minZoom(0)
                    ->maxZoom(28)
                    ->tilesUrl("https://tile.openstreetmap.de/{z}/{x}/{y}.png")
                    ->detectRetina(true)

                    // Marker Configuration
                    ->showMarker(true)
                    ->markerColor("#3b82f6")
                    ->markerHtml('<div class="custom-marker">...</div>')
                    ->markerIconUrl('/path/to/marker.png')
                    ->markerIconSize([36, 36])
                    ->markerIconClassName('my-marker-class')
                    ->markerIconAnchor([18, 36])

                    ->afterStateHydrated(function ($state, $record, Set $set): void {
                        $set('location', ['lat' => $record?->latitude, 'lng' => $record?->longitude]);
                    })
            ]);
    }
}
