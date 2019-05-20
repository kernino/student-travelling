<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaysPlannings extends Model
{
    protected $primaryKey = 'dayPlanning_id';
    
    public function PlanningTrips(){
        return $this->belongsTo('App\Models\PlanningTrips');
    }
}