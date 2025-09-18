<?php

namespace App\Filament\Resources\Fleets\Pages;

use App\Filament\Resources\Fleets\FleetResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageFleets extends ManageRecords
{
    protected static string $resource = FleetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
