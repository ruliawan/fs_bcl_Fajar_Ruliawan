<?php

namespace App\Filament\Resources\Bookings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class BookingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('fleet.fleet_number')
                    ->label('Armada')
                    ->sortable(),
                TextColumn::make('shipment.tracking_number')
                    ->label('Nomor Pengiriman')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('booking_date')
                    ->label('Tanggal Pemesanan')
                    ->date()
                    ->sortable(),
                TextColumn::make('item_details')
                    ->label('Detail Barang')
                    ->limit(30),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
