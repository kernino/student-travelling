<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autos extends Model
{
    protected $primaryKey = 'auto_id';
    
    public function AutosTrips(){
        return $this->belongsTo('App\Models\AutoTrips');
    }
}