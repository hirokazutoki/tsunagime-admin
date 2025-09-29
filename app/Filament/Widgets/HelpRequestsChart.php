<?php

namespace App\Filament\Widgets;

use App\Models\HelpRequest;
use Filament\Widgets\ChartWidget;

class HelpRequestsChart extends ChartWidget
{
    protected ?string $heading = 'Help Requests (Cumulative)';

    public ?string $filter = 'last7Days';

    protected function getFilters(): ?array
    {
        return [
            'last7Days' => 'Last 7 days',
            'sinceOpening'=> 'Since opening',
        ];
    }

    protected function getData(): array
    {
        $activeFilter = $this->filter;
        if ($activeFilter === 'last7Days') {
            $subInt = 6;
        } else {
            $subInt = 9; // TODO: ボランティアセンター開設日からの取得にかえる
        }

        $startDate = now()->subDays($subInt)->startOfDay();
        $endDate   = now()->endOfDay();

        $createdCounts = HelpRequest::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->pluck('count', 'date');

        $completedCounts = HelpRequest::selectRaw('DATE(completed_at) as date, COUNT(*) as count')
            ->whereNotNull('completed_at')
            ->whereBetween('completed_at', [$startDate, $endDate])
            ->groupBy('date')
            ->pluck('count', 'date');

        $labels = collect(range(0, $subInt))
            ->map(fn ($i) => now()->subDays($subInt - $i)->toDateString());

        // for cumulative
        $createdTotal = 0;
        $completedTotal = 0;

        $createdData = [];
        $completedData = [];

        foreach ($labels as $date) {
            $createdTotal += $createdCounts[$date] ?? 0;
            $completedTotal += $completedCounts[$date] ?? 0;

            $createdData[] = $createdTotal;
            $completedData[] = $completedTotal;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Pending',
                    'data' => $createdData,
                ],
                [
                    'label' => 'Completed',
                    'data' => $completedData,
                    'backgroundColor' => '#00a65a',
                    'borderColor' => '#00a65a',
                    'fill' => true,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
