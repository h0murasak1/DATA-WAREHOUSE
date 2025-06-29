<?php

namespace App\Filament\Admin\Resources\DimUserResource\Pages;

use App\Filament\Admin\Resources\DimUserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDimUsers extends ListRecords
{
    protected static string $resource = DimUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
