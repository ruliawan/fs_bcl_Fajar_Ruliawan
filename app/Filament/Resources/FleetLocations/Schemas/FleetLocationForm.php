<?php

namespace App\Filament\Resources\FleetLocations\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use App\Models\Fleet;

class FleetLocationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('fleet_id')
                    ->label('Armada')
                    ->options(Fleet::pluck('fleet_number', 'id'))
                    ->searchable()
                    ->required(),

                TextInput::make('latitude')
                    ->numeric()
                    ->required(),

                TextInput::make('longitude')
                    ->numeric()
                    ->required(),
            ]);
    }
}
