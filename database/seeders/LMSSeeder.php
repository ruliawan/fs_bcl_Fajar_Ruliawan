<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LMSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Fleet::factory()->createMany([
            ['fleet_number' => 'A001', 'vehicle_type' => 'Truck', 'availability' => 'tersedia', 'capacity' => 1000],
            ['fleet_number' => 'A002', 'vehicle_type' => 'Van', 'availability' => 'tersedia', 'capacity' => 500],
            ['fleet_number' => 'A003', 'vehicle_type' => 'Pick-Up', 'availability' => 'tidak tersedia', 'capacity' => 700],
        ]);

        \App\Models\Shipment::factory()->createMany([
            [
                'tracking_number' => 'TRK001',
                'shipping_date' => now(),
                'origin' => 'Jakarta',
                'destination' => 'Bandung',
                'status' => 'dalam perjalanan',
                'item_details' => '10 Box Elektronik',
                'fleet_id' => 1
            ],
            [
                'tracking_number' => 'TRK002',
                'shipping_date' => now()->addDay(),
                'origin' => 'Surabaya',
                'destination' => 'Yogyakarta',
                'status' => 'tertunda',
                'item_details' => '5 Palet Furniture',
                'fleet_id' => 2
            ],
        ]);
    }

}
