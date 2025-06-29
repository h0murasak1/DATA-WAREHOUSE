<?php

namespace App\Filament\Admin\Widgets;

use App\Models\FactVisits;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TopComicsWidget extends BaseWidget
{
    protected static ?int $sort = 4;
    protected int | string | array $columnSpan = 'full'; // Agar widget ini memakai lebar penuh

    public function table(Table $table): Table
    {
        return $table
            ->query(
                FactVisits::query()
                    ->join('dim_comics', 'fact_visits.comic_id', '=', 'dim_comics.id')
                    ->select(
                        'dim_comics.id as comic_id', // Add this line
                        'dim_comics.title as comic_title',
                        'dim_comics.genre as comic_genre',
                        DB::raw('COUNT(fact_visits.id) as total_visits')
                    )
                    ->groupBy('dim_comics.id', 'comic_title', 'comic_genre') // Group by comic_id too
                    ->orderByDesc('total_visits')
                    ->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('comic_title')
                    ->label('Judul Komik')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('comic_genre')
                    ->label('Genre')
                    ->badge()
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_visits')
                    ->label('Jumlah Kunjungan')
                    ->sortable(),
            ])
            ->paginated(false); // Nonaktifkan paginasi karena kita hanya menampilkan 10 teratas
    }

    public function getTableRecordKey(Model $record): string
    {
        return (string) $record->comic_id;
    }
}
