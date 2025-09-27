<?php

namespace App\Filament\Resources\Volunteers;

use App\Filament\Resources\Volunteers\Pages\CreateVolunteer;
use App\Filament\Resources\Volunteers\Pages\EditVolunteer;
use App\Filament\Resources\Volunteers\Pages\ListVolunteers;
use App\Filament\Resources\Volunteers\Pages\ViewVolunteer;
use App\Filament\Resources\Volunteers\Schemas\VolunteerForm;
use App\Filament\Resources\Volunteers\Schemas\VolunteerInfolist;
use App\Filament\Resources\Volunteers\Tables\VolunteersTable;
use App\Models\Volunteer;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VolunteerResource extends Resource
{
    protected static ?string $model = Volunteer::class;

    protected static string|null|\UnitEnum $navigationGroup = 'Users';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;

    protected static string|null|BackedEnum $activeNavigationIcon = Heroicon::Users;

    public static function form(Schema $schema): Schema
    {
        return VolunteerForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return VolunteerInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VolunteersTable::configure($table);
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
            'index' => ListVolunteers::route('/'),
            'create' => CreateVolunteer::route('/create'),
            'view' => ViewVolunteer::route('/{record}'),
            'edit' => EditVolunteer::route('/{record}/edit'),
        ];
    }
}
