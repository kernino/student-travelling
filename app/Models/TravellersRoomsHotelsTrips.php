<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TravellersRoomsHotelsTrips extends Model
{
    protected $primaryKey = 'traveller_room_hotel_trip_id';

    public function Travellers(){
        return $this->belongsTo('App\Models\Travellers');
    }

    public function RoomsHotelsTrips(){
        return $this->belongsTo('App\Models\RoomsHotelsTrips');
     }
}
