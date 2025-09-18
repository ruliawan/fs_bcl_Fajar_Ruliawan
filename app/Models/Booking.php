<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['fleet_id', 'shipment_id', 'booking_date', 'item_details'];

    public function fleet()
    {
        return $this->belongsTo(Fleet::class);
    }

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
}

