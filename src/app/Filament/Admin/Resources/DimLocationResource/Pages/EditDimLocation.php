<?php

namespace App\Filament\Admin\Resources\DimLocationResource\Pages;

use App\Filament\Admin\Resources\DimLocationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDimLocation extends EditRecord
{
    protected static string $resource = DimLocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
