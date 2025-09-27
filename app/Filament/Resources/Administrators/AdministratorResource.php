<?php

namespace App\Filament\Resources\Administrators;

use App\Filament\Resources\Administrators\Pages\CreateAdministrator;
use App\Filament\Resources\Administrators\Pages\EditAdministrator;
use App\Filament\Resources\Administrators\Pages\ListAdministrators;
use App\Filament\Resources\Administrators\Pages\ViewAdministrator;
use App\Filament\Resources\Administrators\Schemas\AdministratorForm;
use App\Filament\Resources\Administrators\Schemas\AdministratorInfolist;
use App\Filament\Resources\Administrators\Tables\AdministratorsTable;
use App\Models\Administrator;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AdministratorResource extends Resource
{
    protected static ?string $model = Administrator::class;


    protected static string|null|\UnitEnum $navigationGroup = 'Users';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;

    protected static string|BackedEnum|null $activeNavigationIcon = Heroicon::Users;

    public static function form(Schema $schema): Schema
    {
        return AdministratorForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AdministratorInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AdministratorsTable::configure($table);
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
            'index' => ListAdministrators::route('/'),
            'create' => CreateAdministrator::route('/create'),
            'view' => ViewAdministrator::route('/{record}'),
            'edit' => EditAdministrator::route('/{record}/edit'),
        ];
    }
}
