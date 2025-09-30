<?php

namespace App\Filament\Resources\CenterStaff;

use App\Filament\Resources\CenterStaff\Pages\CreateCenterStaff;
use App\Filament\Resources\CenterStaff\Pages\EditCenterStaff;
use App\Filament\Resources\CenterStaff\Pages\ListCenterStaff;
use App\Filament\Resources\CenterStaff\Pages\ViewCenterStaff;
use App\Filament\Resources\CenterStaff\Schemas\CenterStaffForm;
use App\Filament\Resources\CenterStaff\Schemas\CenterStaffInfolist;
use App\Filament\Resources\CenterStaff\Tables\CenterStaffTable;
use App\Models\CenterStaff;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CenterStaffResource extends Resource
{
    protected static ?string $model = CenterStaff::class;

    protected static string|null|\UnitEnum $navigationGroup = 'Volunteer Center';

    protected static ?string $navigationLabel = 'Staff';

    protected static ?int $navigationSort = 8;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;

    protected static string|null|BackedEnum $activeNavigationIcon = Heroicon::Users;

    protected static ?string $recordTitleAttribute = 'CenterStaff';

    public static function form(Schema $schema): Schema
    {
        return CenterStaffForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CenterStaffInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CenterStaffTable::configure($table);
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
            'index' => ListCenterStaff::route('/'),
            'create' => CreateCenterStaff::route('/create'),
            'view' => ViewCenterStaff::route('/{record}'),
            'edit' => EditCenterStaff::route('/{record}/edit'),
        ];
    }
}
