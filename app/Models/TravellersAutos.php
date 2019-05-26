<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TravellersAutos extends Model
{
    protected $primaryKey = 'traveller_auto_id';
    
    public function Travellers(){
        return $this->belongsTo('App\Models\Travellers');
    }
    
    public function AutosTrips(){
        return $this->belongsTo('App\Models\AutosTrips');
    }
}
