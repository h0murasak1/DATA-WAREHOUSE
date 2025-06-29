<?php

namespace App\Filament\Admin\Widgets;

use App\Models\FactVisits;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class VisitsStatsOverview extends BaseWidget
{
    protected static ?int $sort = 1; // Urutan di dasbor
    protected function getStats(): array
    {
        return [
            Stat::make('Total Kunjungan', FactVisits::count())
                ->description('Semua kunjungan tercatat')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Pembaca Unik', FactVisits::distinct('user_id')->count())
                ->description('Jumlah pembaca yang berbeda')
                ->descriptionIcon('heroicon-m-users')
                ->color('info'),
            Stat::make('Komik Terbaca', FactVisits::distinct('comic_id')->count())
                ->description('Jumlah judul komik yang dikunjungi')
                ->descriptionIcon('heroicon-m-book-open')
                ->color('warning'),
        ];
    }
}
