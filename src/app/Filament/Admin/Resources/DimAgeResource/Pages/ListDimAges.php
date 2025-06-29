<?php

namespace App\Filament\Admin\Resources\DimAgeResource\Pages;

use App\Filament\Admin\Resources\DimAgeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDimAges extends ListRecords
{
    protected static string $resource = DimAgeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
