<?php

namespace App\Filament\Admin\Widgets;

use App\Models\FactVisits;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class VisitsChart extends ChartWidget
{
    protected static ?string $heading = 'Tren Kunjungan Harian';
    protected static ?int $sort = 2; // Urutan di dasbor

    public ?string $filter = 'month';

    protected function getFilters(): ?array
    {
        return [
            'week' => 'Minggu Ini',
            'month' => 'Bulan Ini',
            'year' => 'Tahun Ini',
            'all' => 'Seluruh Waktu',
        ];
    }

    protected function getData(): array
    {
        $activeFilter = $this->filter;
        
        $query = FactVisits::query()
            ->join('dim_dates', 'fact_visits.date_id', '=', 'dim_dates.id');

        switch ($activeFilter) {
            case 'week':
                $query->where('dim_dates.date', '>=', Carbon::now()->startOfWeek());
                break;
            case 'month':
                $query->where('dim_dates.date', '>=', Carbon::now()->startOfMonth());
                break;
            case 'year':
                $query->where('dim_dates.date', '>=', Carbon::now()->startOfYear());
                break;
            case 'all':
                
        }

        $data = $query
            ->selectRaw('DATE(dim_dates.date) as date, COUNT(fact_visits.id) as count')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Kunjungan',
                    'data' => $data->map(fn ($value) => $value->count),
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#36A2EB',
                ],
            ],
            'labels' => $data->map(fn ($value) => Carbon::parse($value->date)->format('d M Y')),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
