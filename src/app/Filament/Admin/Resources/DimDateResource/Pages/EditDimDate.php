<?php

namespace App\Filament\Admin\Resources\DimDateResource\Pages;

use App\Filament\Admin\Resources\DimDateResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDimDate extends EditRecord
{
    protected static string $resource = DimDateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
