<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomsHotelsTrips extends Model
{
    protected $primaryKey = 'room_hotel_trip_id';
    
    public function TravellersRoomsHotelsTrips(){
        return $this->hasMany('App\Models\TravellersRoomsHotelsTrips');
    }
    
    public function HotelsTrips(){
        return $this->belongsTo('App\Models\HotelsTrips');
    }
}

