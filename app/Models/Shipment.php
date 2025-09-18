<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $fillable = ['tracking_number', 'shipping_date', 'origin', 'destination', 'status', 'item_details', 'fleet_id'];

    public function fleet()
    {
        return $this->belongsTo(Fleet::class);
    }

    public function booking()
    {
        return $this->hasOne(Booking::class);
    }
}

