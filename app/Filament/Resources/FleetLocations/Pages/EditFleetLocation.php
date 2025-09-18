<?php

namespace App\Filament\Resources\FleetLocations\Pages;

use App\Filament\Resources\FleetLocations\FleetLocationResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFleetLocation extends EditRecord
{
    protected static string $resource = FleetLocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
