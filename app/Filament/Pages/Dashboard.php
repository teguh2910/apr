<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\Select;
use Filament\Pages\Dashboard\Actions\FilterAction;
use Filament\Pages\Dashboard\Concerns\HasFiltersAction;
use App\Models\Monitor;


class Dashboard extends \Filament\Pages\Dashboard
{
    protected static string $routePath = 'dashboard';
    protected static ?string $title = 'Dashboard';
    use HasFiltersAction;
    protected function getHeaderActions(): array
    {
        return [
            FilterAction::make()
                ->form([
                    Select::make('year')
                    ->options(Monitor::all()->pluck('year', 'year'))
                    ->searchable(),
                    Select::make('coy')
                    ->options(Monitor::all()->pluck('coy', 'coy'))
                    ->searchable()                    
                ]),
        ];
    }
}
