<?php

namespace App\Filament\Admin\Resources\DimComicResource\Pages;

use App\Filament\Admin\Resources\DimComicResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDimComics extends ListRecords
{
    protected static string $resource = DimComicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
