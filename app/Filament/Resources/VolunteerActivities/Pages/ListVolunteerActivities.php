<?php

namespace App\Filament\Resources\VolunteerActivities\Pages;

use App\Filament\Resources\VolunteerActivities\VolunteerActivityResource;
use App\Models\VolunteerActivity;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Support\Collection;

class ListVolunteerActivities extends ListRecords
{
    protected static string $resource = VolunteerActivityResource::class;

    public Collection $volunteerActivitiesByProcessStatus;

    public function __construct()
    {
        $this->volunteerActivitiesByProcessStatus = VolunteerActivity::select('process_status', \DB::raw('count(*) as count'))
            ->groupBy('process_status')
            ->pluck('count', 'process_status');
    }
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'waiting_for_outbound' => Tab::make()
                ->badge($this->volunteerActivitiesByProcessStatus['waiting_for_outbound'] ?? 0)
                ->badgeColor('gray')
                ->modifyQueryUsing(function ($query) {
                    return $query->whereProcessStatus('waiting_for_outbound');
                }),
            'outbound' => Tab::make()
                ->badge($this->volunteerActivitiesByProcessStatus['outbound'] ?? 0)
                ->badgeColor('gray')
                ->modifyQueryUsing(function ($query) {
                    return $query->whereProcessStatus('outbound');
                }),
            'active' => Tab::make()
                ->badge($this->volunteerActivitiesByProcessStatus['active'] ?? 0)
                ->badgeColor('gray')
                ->modifyQueryUsing(function ($query) {
                    return $query->whereProcessStatus('active');
                }),
            'waiting_for_return' => Tab::make()
                ->badge($this->volunteerActivitiesByProcessStatus['waiting_for_return'] ?? 0)
                ->badgeColor('gray')
                ->modifyQueryUsing(function ($query) {
                    return $query->whereProcessStatus('waiting_for_return');
                }),
            'return' => Tab::make()
                ->badge($this->volunteerActivitiesByProcessStatus['return'] ?? 0)
                ->badgeColor('gray')
                ->modifyQueryUsing(function ($query) {
                    return $query->whereProcessStatus('return');
                }),
            'reporting' => Tab::make()
                ->badge($this->volunteerActivitiesByProcessStatus['reporting'] ?? 0)
                ->badgeColor('gray')
                ->modifyQueryUsing(function ($query) {
                    return $query->whereProcessStatus('reporting');
                }),
            'all' => Tab::make()
                ->badge($this->volunteerActivitiesByProcessStatus->sum())
                ->badgeColor('gray'),
        ];
    }
}
