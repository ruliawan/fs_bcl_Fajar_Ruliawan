<?php

namespace App\Filament\Resources\FleetLocations\Pages;

use App\Filament\Resources\FleetLocations\FleetLocationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFleetLocations extends ListRecords
{
    protected static string $resource = FleetLocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
