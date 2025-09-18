<?php

namespace App\Filament\Resources\Bookings\Pages;

use App\Filament\Resources\Bookings\BookingResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Fleet;

class CreateBooking extends CreateRecord
{
    protected static string $resource = BookingResource::class;

    protected function afterCreate(): void
    {
        $fleet = $this->record->fleet;
        if ($fleet) {
            $fleet->update(['availability' => 'tidak tersedia']);
        }
    }

}
