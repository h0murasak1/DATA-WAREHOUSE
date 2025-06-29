<?php

namespace App\Filament\Admin\Resources\FactVisitsResource\Pages;

use App\Filament\Admin\Resources\FactVisitsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use pxlrbt\FilamentExcel\Columns\Column;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;

class ListFactVisits extends ListRecords
{
    protected static string $resource = FactVisitsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            ExportAction::make() 
            ->exports([
                ExcelExport::make()
                    ->fromTable()
                    ->withFilename(fn ($resource) => $resource::getModelLabel() . '-' . date('Y-m-d'))
                    ->withWriterType(\Maatwebsite\Excel\Excel::XLSX)
                    ->withColumns([
                        Column::make('updated_at'),
                    ])
            ]), 
        ];
    }
}
