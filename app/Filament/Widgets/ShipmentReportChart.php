<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Fleet;
use Illuminate\Support\Facades\DB;

class ShipmentReportChart extends ChartWidget
{
     protected static ?string $heading = 'Laporan Pengiriman per Armada';
    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        $results = DB::table('fleets')
            ->leftJoin('shipments', 'shipments.fleet_id', '=', 'fleets.id')
            ->select('fleets.fleet_number', DB::raw("COUNT(shipments.id) as total"))
            ->where('shipments.status', '=', 'dalam perjalanan')
            ->groupBy('fleets.id', 'fleets.fleet_number')
            ->get();

        $labels = $results->pluck('fleet_number')->toArray();
        $data   = $results->pluck('total')->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Pengiriman Dalam Perjalanan',
                    'data' => $data,
                    'backgroundColor' => '#3b82f6', 
                ],
            ],
            'labels' => $labels,

        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
