<?php

namespace App\Filament\Resources\VolunteerActivities;

use App\Filament\Resources\VolunteerActivities\Pages\CreateVolunteerActivity;
use App\Filament\Resources\VolunteerActivities\Pages\EditVolunteerActivity;
use App\Filament\Resources\VolunteerActivities\Pages\ListVolunteerActivities;
use App\Filament\Resources\VolunteerActivities\Pages\ViewVolunteerActivity;
use App\Filament\Resources\VolunteerActivities\Schemas\VolunteerActivityForm;
use App\Filament\Resources\VolunteerActivities\Schemas\VolunteerActivityInfolist;
use App\Filament\Resources\VolunteerActivities\Tables\VolunteerActivitiesTable;
use App\Models\VolunteerActivity;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VolunteerActivityResource extends Resource
{
    protected static ?string $model = VolunteerActivity::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleGroup;

    protected static string|BackedEnum|null $activeNavigationIcon = Heroicon::RectangleGroup;
    protected static ?string $recordTitleAttribute = 'VolunteerActivity';

    public static function form(Schema $schema): Schema
    {
        return VolunteerActivityForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return VolunteerActivityInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VolunteerActivitiesTable::configure($table);
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
            'index' => ListVolunteerActivities::route('/'),
            'create' => CreateVolunteerActivity::route('/create'),
            'view' => ViewVolunteerActivity::route('/{record}'),
            'edit' => EditVolunteerActivity::route('/{record}/edit'),
        ];
    }
}
