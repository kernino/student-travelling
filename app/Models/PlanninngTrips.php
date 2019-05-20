<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanningTrips extends Model
{
    protected $primaryKey = "planningTrip_id";
    
    public function Planning(){
        return $this->hasMany('App\Models\Planning');
    }
}