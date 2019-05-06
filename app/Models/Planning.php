<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    protected $primaryKey = 'planning_id';
    
    public function PlanningTrips(){
        return $this->belongsTo('App\Models\PlanningTrips');
    }
}