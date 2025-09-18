<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fleet extends Model
{
    protected $fillable = ['fleet_number', 'vehicle_type', 'availability', 'capacity'];

    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function locations()
    {
        return $this->hasMany(FleetLocation::class);
    }
}

