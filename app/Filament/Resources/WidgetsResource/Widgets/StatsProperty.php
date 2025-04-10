<?php

namespace App\Filament\Resources\WidgetsResource\Widgets;

use App\Models\Property;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsProperty extends BaseWidget
{
    protected function getStats(): array
    {
        $propertiesCount = Property::count();
        return [
            Stat::make('Nombre de propriétes en ligne', $propertiesCount),
        ];
    }
}
