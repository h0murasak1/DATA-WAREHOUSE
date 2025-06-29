<?php

namespace App\Filament\Admin\Widgets;

use App\Models\FactVisits;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class GenderChart extends ChartWidget
{
    protected static ?string $heading = 'Distribusi Pembaca Berdasarkan Gender';
    protected static ?string $maxHeight = '350px';
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $data = FactVisits::query()
            ->join('dim_users', 'fact_visits.user_id', '=', 'dim_users.id')
            ->select('dim_users.gender', DB::raw('COUNT(*) as count'))
            ->groupBy('dim_users.gender')
            ->get();
        
        return [
            'datasets' => [
                [
                    'label' => 'Gender',
                    'data' => $data->pluck('count')->toArray(),
                    'backgroundColor' => ['#FF6384', '#36A2EB'],
                ],
            ],
            'labels' => $data->pluck('gender')->map(fn($gender) => ucfirst($gender))->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
