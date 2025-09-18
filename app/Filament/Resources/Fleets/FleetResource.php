<?php

namespace App\Filament\Resources\Fleets;

use App\Filament\Resources\Fleets\Pages\ManageFleets;
use App\Models\Fleet;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class FleetResource extends Resource
{
    protected static ?string $model = Fleet::class;

    protected static string | UnitEnum | null $navigationGroup = 'Manajemen Armada';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Armada';

    protected static ?string $navigationLabel = 'Armada';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('fleet_number')
                    ->label('Nomor Armada')
                    ->required()
                    ->unique(ignoreRecord: true),
                Select::make('vehicle_type')
                    ->label('Jenis Kendaraan')
                    ->options([
                        'Truck' => 'Truck',
                        'Van' => 'Van',
                        'Pick-Up' => 'Pick-Up',
                    ])
                    ->required(),
                Select::make('availability')
                    ->label('Ketersediaan')
                    ->options([
                        'tersedia' => 'Tersedia',
                        'tidak tersedia' => 'Tidak Tersedia',
                    ])
                    ->default('tersedia')
                    ->required(),
                TextInput::make('capacity')
                    ->label('Kapasitas Muatan (kg)')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Fleet')
            ->columns([
                TextColumn::make('fleet_number')
                    ->label('Nomor Armada')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('vehicle_type')
                    ->label('Jenis Kendaraan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('availability')
                    ->label('Ketersediaan')
                    ->badge()
                    ->colors([
                        'success' => 'tersedia',
                        'danger' => 'tidak tersedia',
                    ])
                    ->searchable()
                    ->sortable(),
                TextColumn::make('capacity')
                    ->label('Kapasitas (kg)')
                    ->sortable(),
            ])
            ->filters([
                Select::make('availability')
                    ->label('Ketersediaan')
                    ->options([
                        'tersedia' => 'Tersedia',
                        'tidak tersedia' => 'Tidak Tersedia',
                    ]),

                Select::make('vehicle_type')
                    ->label('Jenis Kendaraan')
                    ->options([
                        'Truck' => 'Truck',
                        'Van' => 'Van',
                        'Pick-Up' => 'Pick-Up',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageFleets::route('/'),
        ];
    }
}
