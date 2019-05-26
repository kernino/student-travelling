<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trips extends Model
{
    protected $primaryKey = 'trip_id';

    public function AutosTrips(){
        return $this->hasMany('App\Models\AutosTrips');
    }

    public function HotelsTrips(){
        return $this->hasMany('App\Models\HotelsTrips');
    }
    
    public function DaysPlanningsTrips(){
        return $this->hanMany('App\Models\DaysPlanningsTrips');
    }
    
    public function Info(){
        return $this->hasMany('App\Models\Info');
    }
    
    public function TravellersTrips(){
        return $this->hasMany('App\Models\TravellersTrips');
    }
}

