<?php

namespace App\Filament\Widgets;

use App\Models\Supplier;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SupplierTypeOverview extends BaseWidget
{
    protected ?string $heading = 'Supplier Clasification';
    
    protected function getStats(): array
    {
        return [
            Stat::make('Total Supplier', Supplier::query()->count())->description('Supplier'),
            Stat::make('Raw Material', Supplier::query()->where('category', 'RM')->count())->description('Supplier'),
            Stat::make('Component', Supplier::query()->where('category', 'COMP')->count())->description('Supplier'),
            Stat::make('Component CPS', Supplier::query()->where('category', 'COMP CPS')->count())->description('Supplier'),
            Stat::make('Subcont', Supplier::query()->where('category', 'SUBC')->count())->description('Supplier'),
            Stat::make('Subcont CPS', Supplier::query()->where('category', 'SUBC CPS')->count())->description('Supplier'),
        ];
    }
}
