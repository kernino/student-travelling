<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaysPlanningsTrips extends Model
{
    protected $primaryKey = 'day_planning_trip_id';
    
    public function DaysPlannings(){
        return $this->belongsTo('App\Models\PlanningTrips');
    }
    
    public function Trips(){
        return $this->belongsTo('App\Models\Trips');
    }
}
