<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaysPlannings extends Model
{
    protected $primaryKey = 'day_planning_id';
    
    public function DaysPlanningsTrips(){
        return $this->hasMany('App\Models\DayPlanningTrips');
    }

}