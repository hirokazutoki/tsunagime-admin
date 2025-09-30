<?php

namespace App\Filament\Resources\VolunteerGroups;

use App\Filament\Resources\VolunteerGroups\Pages\CreateVolunteerGroup;
use App\Filament\Resources\VolunteerGroups\Pages\EditVolunteerGroup;
use App\Filament\Resources\VolunteerGroups\Pages\ListVolunteerGroups;
use App\Filament\Resources\VolunteerGroups\Pages\ViewVolunteerGroup;
use App\Filament\Resources\VolunteerGroups\Schemas\VolunteerGroupForm;
use App\Filament\Resources\VolunteerGroups\Schemas\VolunteerGroupInfolist;
use App\Filament\Resources\VolunteerGroups\Tables\VolunteerGroupsTable;
use App\Filament\Resources\Volunteers\VolunteerResource;
use App\Models\Volunteer;
use App\Models\VolunteerGroup;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VolunteerGroupResource extends Resource
{
    protected static ?string $model = VolunteerGroup::class;

    protected static string|null|\UnitEnum $navigationGroup = 'Users';

    protected static ?string $navigationParentItem = 'Volunteers';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserGroup;

    protected static string|BackedEnum|null $activeNavigationIcon = Heroicon::UserGroup;

    public static function form(Schema $schema): Schema
    {
        return VolunteerGroupForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return VolunteerGroupInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VolunteerGroupsTable::configure($table);
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
            'index' => ListVolunteerGroups::route('/'),
            'create' => CreateVolunteerGroup::route('/create'),
            'view' => ViewVolunteerGroup::route('/{record}'),
            'edit' => EditVolunteerGroup::route('/{record}/edit'),
        ];
    }
}
