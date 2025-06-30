<?php

namespace App\Filament\Admin\Widgets;

use App\Models\FactVisits;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class PopularGenresChart extends ChartWidget
{
    protected static ?string $heading = 'Top 5 Genre Terpopuler';
    protected static ?int $sort = 8;

    protected function getData(): array
    {
        $data = FactVisits::query()
            ->join('dim_comics', 'fact_visits.comic_id', '=', 'dim_comics.id')
            ->select('dim_comics.genre', DB::raw('COUNT(*) as total'))
            ->groupBy('dim_comics.genre')
            ->orderByDesc('total') // Urutkan dari yang paling populer
            ->limit(10) // Ambil 10 teratas untuk menjaga grafik tetap bersih
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Kunjungan',
                    'data' => $data->pluck('total')->toArray(),
                    // Anda bisa menambahkan warna-warni di sini jika mau
                ],
            ],
            'labels' => $data->pluck('genre')->toArray(),
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
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                ],
            ],
        ];
    }
}
