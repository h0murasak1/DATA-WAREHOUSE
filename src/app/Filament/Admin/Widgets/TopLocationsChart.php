<?php

namespace App\Filament\Admin\Widgets;

use App\Models\FactVisits;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class TopLocationsChart extends ChartWidget
{
    protected static ?string $heading = 'Top 5 Lokasi Pengunjung';
    protected static ?int $sort = 6;
    

    protected function getData(): array
    {
        $data = FactVisits::query()
            ->join('dim_locations', 'fact_visits.location_id', '=', 'dim_locations.id')
            ->select('dim_locations.country', DB::raw('COUNT(*) as total'))
            ->groupBy('dim_locations.country')
            ->orderByDesc('total')
            ->limit(10)
            ->get();
            
        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Kunjungan',
                    'data' => $data->pluck('total')->toArray(),
                    'backgroundColor' => '#4BC0C0',
                    'borderColor' => '#4BC0C0',
                ],
            ],
            'labels' => $data->pluck('country')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'indexAxis' => 'y',
        ];
    }
}
