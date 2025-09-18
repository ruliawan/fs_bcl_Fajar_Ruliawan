<?php

namespace App\Filament\Resources\FleetLocations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class FleetLocationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('fleet.fleet_number')
                    ->label('Armada'),

                TextColumn::make('latitude')
                    ->label('Latitude'),

                TextColumn::make('longitude')
                    ->label('Longitude'),

                TextColumn::make('updated_at')
                    ->label('Update Terakhir')
                    ->dateTime(),
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
