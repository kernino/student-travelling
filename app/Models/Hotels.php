<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $primaryKey = 'hotel_id';
    
    public function HotelsTrips(){
         return $this->hasMany('App\Models\HotelsTrips');
    }
}
