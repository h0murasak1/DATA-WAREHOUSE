<?php

namespace App\Filament\Admin\Resources\DimComicResource\Pages;

use App\Filament\Admin\Resources\DimComicResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDimComic extends EditRecord
{
    protected static string $resource = DimComicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
