<?php

namespace App\Filament\Imports;

use App\Models\Monitor;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class MonitorImporter extends Importer
{
    protected static ?string $model = Monitor::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('supplier_id')
                ->requiredMapping()
                ->relationship()
                ->rules(['required']),
            ImportColumn::make('apr_period')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('year')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer']),
            ImportColumn::make('status')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('coy')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
        ];
    }

    public function resolveRecord(): ?Monitor
    {
        // return Monitor::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Monitor();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your monitor import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
