<?php

namespace App\Filament\Admin\Resources\DimDateResource\Pages;

use App\Filament\Admin\Resources\DimDateResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDimDates extends ListRecords
{
    protected static string $resource = DimDateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
