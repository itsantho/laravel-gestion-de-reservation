<?php

namespace App\Filament\Resources\WidgetsResource\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Booking; // Assurez-vous d'importer votre modèle Booking
use Carbon\Carbon;

class StatsBooking extends ChartWidget
{
    protected static ?string $heading = 'Réservations des 3 derniers mois';

    protected function getData(): array
    {
        // Obtenez la date actuelle et les trois derniers mois
        $currentMonth = Carbon::now();
        $lastThreeMonths = [
            $currentMonth->copy()->subMonths(2)->format('F'),
            $currentMonth->copy()->subMonths(1)->format('F'),
            $currentMonth->format('F'),
        ];

        // Récupérez le nombre de réservations pour chaque mois
        $bookingsData = [];
        foreach ($lastThreeMonths as $month) {
            $count = Booking::whereMonth('created_at', Carbon::parse($month)->month)
                ->whereYear('created_at', $currentMonth->year)
                ->count();
            $bookingsData[] = $count;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Nombre de Réservations',
                    'data' => $bookingsData,
                    'backgroundColor' => ['#36A2EB', '#FF6384', '#FFCE56'],
                ],
            ],
            'labels' => $lastThreeMonths,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
