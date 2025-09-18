<?php

namespace App\Filament\Resources\Shipments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use App\Models\Fleet;

class ShipmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tracking_number')
                    ->label('Nomor Pengiriman')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('shipping_date')
                    ->label('Tanggal')
                    ->date()
                    ->sortable(),
                TextColumn::make('origin')
                    ->label('Asal')
                    ->searchable(),
                TextColumn::make('destination')
                    ->label('Tujuan')
                    ->searchable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                     ->colors([
                        'warning' => 'tertunda',
                        'info' => 'dalam perjalanan',
                        'success' => 'telah tiba',
                    ])
                    ->searchable()
                    ->sortable(),
                 TextColumn::make('fleet.fleet_number')
                    ->label('Armada')
                    ->sortable(),
            ])
            ->filters([
                Select::make('status')
                    ->label('Status Pengiriman')
                    ->options([
                        'tertunda' => 'Tertunda',
                        'dalam perjalanan' => 'Dalam Perjalanan',
                        'telah tiba' => 'Telah Tiba',
                    ]),
                Select::make('fleet_id')
                    ->label('Armada')
                    ->options(Fleet::pluck('fleet_number', 'id')),
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
