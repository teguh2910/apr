<?php

namespace App\Filament\Resources\MonitorResource\Pages;

use App\Filament\Resources\MonitorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\ImportAction;
use App\Filament\Imports\MonitorImporter;

class ListMonitors extends ListRecords
{
    protected static string $resource = MonitorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            ImportAction::make()
            ->importer(MonitorImporter::class),
        ];
    }
}
