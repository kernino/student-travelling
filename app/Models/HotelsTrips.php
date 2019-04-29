<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelsTrips extends Model
{
    protected $primaryKey = 'hotel_trip_id';

    public function Trips(){
        return $this->belongsTo('App\Models\Trips');
    }

    public function Hotels(){
        return $this->belongsTo('App\Models\Hotels');
    }
}