<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AutosTrips extends Model
{
    protected $primaryKey = 'auto_trip_id';
    
    public function Autos(){
        return $this->belongsTo('App\Models\Autos');
    }
    
    public function TravellersAutos(){
        return $this->hasMany('App\MOdels\TravellersAutos');
    }
    
    public function Trips(){
        return $this->belongsTo('App\Models\Trips');
    }
}

