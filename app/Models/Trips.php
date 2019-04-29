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
}

