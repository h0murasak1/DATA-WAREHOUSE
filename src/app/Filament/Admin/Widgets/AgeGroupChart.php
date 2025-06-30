<?php

namespace App\Filament\Admin\Widgets;

use App\Models\FactVisits;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class AgeGroupChart extends ChartWidget
{
    protected static ?string $heading = 'Distribusi Kunjungan Berdasarkan Usia';
    protected static ?int $sort = 9; // Atur urutan di dasbor
    protected int | string | array $columnSpan = 'full'; // Agar widget ini memakai lebar penuh

    protected function getData(): array
    {
        $data = FactVisits::query()
            ->join('dim_ages', 'fact_visits.age_id', '=', 'dim_ages.id')
            ->select('dim_ages.age_group', DB::raw('COUNT(*) as total'))
            ->groupBy('dim_ages.age_group')
            ->orderBy('dim_ages.age_group') // Urutkan berdasarkan kelompok usia
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Kunjungan',
                    'data' => $data->pluck('total')->toArray(),
                    'backgroundColor' => 'rgba(54, 162, 235, 0.5)',
                    'borderColor' => 'rgb(54, 162, 235)',
                ],
            ],
            'labels' => $data->pluck('age_group')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
