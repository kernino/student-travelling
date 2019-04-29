<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Travellers extends Model
{
    protected $primaryKey = 'traveller_id';
    
    public function TravellersAutos(){
        return $this->belongsTo('App\Models\TravellersAutos');
    }
    
    public function TravellersRoomsHotelsTrips(){
        return $this->belongsTo('App\Models\TravellersRoomsHotelsTrips');
    }
}