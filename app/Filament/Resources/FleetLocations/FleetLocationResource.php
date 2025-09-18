<?php

namespace App\Filament\Resources\FleetLocations;

use App\Filament\Resources\FleetLocations\Pages\CreateFleetLocation;
use App\Filament\Resources\FleetLocations\Pages\EditFleetLocation;
use App\Filament\Resources\FleetLocations\Pages\ListFleetLocations;
use App\Filament\Resources\FleetLocations\Schemas\FleetLocationForm;
use App\Filament\Resources\FleetLocations\Tables\FleetLocationsTable;
use App\Models\FleetLocation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;
use App\Filament\Resources\FleetLocations\Pages\FleetMap;

class FleetLocationResource extends Resource
{
    protected static ?string $model = FleetLocation::class;

    protected static string|UnitEnum|null $navigationGroup = 'Manajemen Armada';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Lokasi Armada';

    protected static ?string $navigationLabel = 'Lokasi Armada';

    public static function form(Schema $schema): Schema
    {
        return FleetLocationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FleetLocationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFleetLocations::route('/'),
            'create' => CreateFleetLocation::route('/create'),
            'edit' => EditFleetLocation::route('/{record}/edit'),
            'map' => FleetMap::route('/map'), 
        ];
    }
}
