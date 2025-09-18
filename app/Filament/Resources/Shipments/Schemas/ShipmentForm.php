<?php

namespace App\Filament\Resources\Shipments\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use App\Models\Fleet;

class ShipmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('tracking_number')
                    ->label('Nomor Pengiriman')
                    ->unique(ignoreRecord: true)
                    ->required(),
                Select::make('fleet_id')
                    ->label('Armada')
                    ->options(Fleet::pluck('fleet_number', 'id'))
                    ->searchable()
                    ->nullable(),

                DatePicker::make('shipping_date')
                    ->label('Tanggal Pengiriman')
                    ->required(),
                TextInput::make('origin')
                    ->label('Lokasi Asal')
                    ->required(),
                TextInput::make('destination')
                    ->label('Lokasi Tujuan')
                    ->required(),
                 Select::make('status')
                    ->label('Status')
                    ->options([
                        'tertunda' => 'Tertunda',
                        'dalam perjalanan' => 'Dalam Perjalanan',
                        'telah tiba' => 'Telah Tiba',
                    ])
                    ->default('tertunda')
                    ->required(),
                 Textarea::make('item_details')
                    ->label('Detail Barang')
                    ->required(),
            ]);
    }
}
