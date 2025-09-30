<?php

namespace App\Filament\Resources\VolunteerCenters;

use App\Filament\Resources\VolunteerCenters\Pages\CreateVolunteerCenter;
use App\Filament\Resources\VolunteerCenters\Pages\EditVolunteerCenter;
use App\Filament\Resources\VolunteerCenters\Pages\ListVolunteerCenters;
use App\Filament\Resources\VolunteerCenters\Pages\ViewVolunteerCenter;
use App\Filament\Resources\VolunteerCenters\Schemas\VolunteerCenterForm;
use App\Filament\Resources\VolunteerCenters\Schemas\VolunteerCenterInfolist;
use App\Filament\Resources\VolunteerCenters\Tables\VolunteerCentersTable;
use App\Models\VolunteerCenter;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VolunteerCenterResource extends Resource
{
    protected static ?string $model = VolunteerCenter::class;

    protected static string|null|\UnitEnum $navigationGroup = 'Volunteer Center';

    protected static ?string $navigationLabel = 'Center Info';

    protected static ?int $navigationSort = 1;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedFlag;

    protected static string|null|BackedEnum $activeNavigationIcon = Heroicon::Flag;
    protected static ?string $recordTitleAttribute = 'VolunteerCenter';

    public static function form(Schema $schema): Schema
    {
        return VolunteerCenterForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return VolunteerCenterInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VolunteerCentersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListVolunteerCenters::route('/'),
            'create' => CreateVolunteerCenter::route('/create'),
            'view' => ViewVolunteerCenter::route('/{record}'),
            'edit' => EditVolunteerCenter::route('/{record}/edit'),
        ];
    }
}
