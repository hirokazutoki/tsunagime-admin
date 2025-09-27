<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Support\Icons\Heroicon;

class Dashboard extends BaseDashboard
{

    protected static string|null|\BackedEnum $navigationIcon = Heroicon::OutlinedHome;

    protected static string|null|\BackedEnum $activeNavigationIcon = Heroicon::Home;

}
