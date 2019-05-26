<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TravellersTrips extends Model
{
    protected $primaryKey = 'traveller_trip_id';
    
    public function Trips(){
        return $this->belongsTo('App\Models\Trips');
    }
    
    public function Travellers(){
        return $this->belongsTo('App\Models\Travellers');
    }
}