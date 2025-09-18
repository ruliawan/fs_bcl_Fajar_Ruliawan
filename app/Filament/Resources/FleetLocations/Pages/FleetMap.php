<?php

namespace App\Filament\Resources\FleetLocations\Pages;

use App\Filament\Resources\FleetLocations\FleetLocationResource;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;
use App\Models\FleetLocation;

class FleetMap extends Page
{
    use InteractsWithRecord;

    protected static string $resource = FleetLocationResource::class;

    protected string $view = 'filament.resources.fleet-locations.pages.fleet-map';

    protected $locations;
    
    public function mount(int|string $record): void
    {
        $this->locations = $this->resolveRecord($record);
    }
}
