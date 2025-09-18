<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FleetLocation extends Model
{
    protected $fillable = ['fleet_id', 'latitude', 'longitude'];

    public function fleet()
    {
        return $this->belongsTo(Fleet::class);
    }
}
