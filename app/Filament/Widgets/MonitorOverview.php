<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use App\Models\monitor;
use Carbon\Carbon;
use Carbon\CarbonImmutable;

class MonitorOverview extends BaseWidget
{
    protected ?string $heading = 'Monitoring APR status';
    use InteractsWithPageFilters;
    protected function getStats(): array
    {
        $year = $this->filters['year'] ?? Carbon::now()->year;
        $coy= $this->filters['coy'] ?? 'AII';
        return [
            Stat::make('Probem', monitor::query()->where('status', 'Problem')->where('year', $year)->where('coy', $coy)->count())->description('Supplier')->color('danger'),
            Stat::make('Not Yet Get Quotation', monitor::query()->where('status', 'No Quotation')->where('year', $year)->count())->description('Supplier')->color('danger'),
            Stat::make('Quotation Receive', monitor::query()->where('status', 'Quotation')->where('year', $year)->where('coy', $coy)->count())->description('Supplier')->color('danger'),
            Stat::make('Create Price Confirmaton', monitor::query()->where('status', 'PC')->where('year', $year)->where('coy', $coy)->count())->description('Supplier')->color('warning'),
            Stat::make('Approval Section Head', monitor::query()->where('status', 'Approval Section Head')->where('year', $year)->where('coy', $coy)->count())->description('Supplier')->color('success'),
            Stat::make('Approval Manager', monitor::query()->where('status', 'Approval manager')->where('year', $year)->where('coy', $coy)->count())->description('Supplier')->color('success'),
            Stat::make('Approval GM', monitor::query()->where('status', 'Approval GM')->where('year', $year)->where('coy', $coy)->count())->description('Supplier')->color('success'),
            Stat::make('Approval DIR', monitor::query()->where('status', 'Approval DIR')->where('year', $year)->where('coy', $coy)->count())->description('Supplier')->color('success'),
            Stat::make('Filling', monitor::query()->where('status', 'Filing')->where('year', $year)->where('coy', $coy)->count())->description('Supplier')->color('success'),
        ];
    }
}
