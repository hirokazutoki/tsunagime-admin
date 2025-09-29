<?php

namespace App\Filament\Resources\HelpRequests\Pages;

use App\Filament\Resources\HelpRequests\HelpRequestResource;
use App\Models\HelpRequest;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Support\Collection;

class ListHelpRequests extends ListRecords
{
    protected static string $resource = HelpRequestResource::class;

    public Collection $helpRequestsByProcessStatus;

    public function __construct()
    {
        $this->helpRequestsByProcessStatus = HelpRequest::select('process_status', \DB::raw('count(*) as count'))
            ->groupBy('process_status')
            ->pluck('count', 'process_status');

        $this->helpRequestsByProcessStatus['today'] = HelpRequest::whereHas('clientAvailabilityDates', function ($query) {
            $query->whereProcessStatus('pending')->today();
        })->count();
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
            'pending' => Tab::make()
                ->badge($this->helpRequestsByProcessStatus['pending'] ?? 0)
                ->badgeColor('gray')
                ->modifyQueryUsing(function ($query) {
                    return $query->whereProcessStatus('pending');
                }),
            'today' => Tab::make()
                 ->badge($this->helpRequestsByProcessStatus['today'] ?? 0) // TODO:
                 ->badgeColor('gray')
                 ->modifyQueryUsing(function ($query) {
                     return $query->whereHas('clientAvailabilityDates', function ($query) {
                         $query->whereProcessStatus('pending')->today();
                     });
                 }),
            'processing' => Tab::make()
                ->badge($this->helpRequestsByProcessStatus['processing'] ?? 0)
                ->badgeColor('gray')
                ->modifyQueryUsing(function ($query) {
                    return $query->whereProcessStatus('processing');
                }),
            'canceled' => Tab::make()
                ->badge($this->helpRequestsByProcessStatus['canceled'] ?? 0)
                ->badgeColor('gray')
                ->modifyQueryUsing(function ($query) {
                    return $query->whereProcessStatus('canceled');
                }),
            'all' => Tab::make()
                ->badge($this->helpRequestsByProcessStatus->sum() - $this->helpRequestsByProcessStatus['today']) // TODO:
                ->badgeColor('gray'),
        ];
    }

    public function getDefaultActiveTab(): string | int | null
    {
        return 'today';
    }
}
