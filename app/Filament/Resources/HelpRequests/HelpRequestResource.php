<?php

namespace App\Filament\Resources\HelpRequests;

use App\Filament\Resources\HelpRequests\Pages\CreateHelpRequest;
use App\Filament\Resources\HelpRequests\Pages\EditHelpRequest;
use App\Filament\Resources\HelpRequests\Pages\ListHelpRequests;
use App\Filament\Resources\HelpRequests\Pages\ViewHelpRequest;
use App\Filament\Resources\HelpRequests\Schemas\HelpRequestForm;
use App\Filament\Resources\HelpRequests\Schemas\HelpRequestInfolist;
use App\Filament\Resources\HelpRequests\Tables\HelpRequestsTable;
use App\Models\HelpRequest;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HelpRequestResource extends Resource
{
    protected static ?string $model = HelpRequest::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChatBubbleBottomCenterText;

    protected static string|BackedEnum|null $activeNavigationIcon = Heroicon::ChatBubbleBottomCenterText;

    public static function form(Schema $schema): Schema
    {
        return HelpRequestForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return HelpRequestInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HelpRequestsTable::configure($table);
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
            'index' => ListHelpRequests::route('/'),
            'create' => CreateHelpRequest::route('/create'),
            'view' => ViewHelpRequest::route('/{record}'),
            'edit' => EditHelpRequest::route('/{record}/edit'),
        ];
    }
}
