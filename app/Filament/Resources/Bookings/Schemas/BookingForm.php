<?php

namespace App\Filament\Resources\Bookings\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use App\Models\Fleet;
use App\Models\Shipment;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('fleet_id')
                    ->label('Armada')
                    ->options(Fleet::where('availability', 'tersedia')->pluck('fleet_number', 'id'))
                    ->searchable()
                    ->required()
                    ->rules([
                        function () {
                            return function (string $attribute, $value, \Closure $fail) {
                                if (\App\Models\Booking::where('fleet_id', $value)
                                    ->whereDate('booking_date', request('booking_date'))
                                    ->exists()) {
                                    $fail('Armada ini sudah dipesan pada tanggal tersebut.');
                                }
                            };
                        },
                    ]),
                Select::make('shipment_id')
                    ->label('Pengiriman')
                    ->options(Shipment::pluck('tracking_number', 'id'))
                    ->searchable()
                    ->required(),
                DatePicker::make('booking_date')
                    ->label('Tanggal Pemesanan')
                    ->required()
                    ->minDate(now()),
                Textarea::make('item_details')
                    ->label('Detail Barang')
                    ->required(),
            ]);
    }
}
