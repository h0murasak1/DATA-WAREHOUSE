<?php

namespace App\Filament\Admin\Resources\DimAgeResource\Pages;

use App\Filament\Admin\Resources\DimAgeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDimAge extends EditRecord
{
    protected static string $resource = DimAgeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
