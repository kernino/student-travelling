<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Travellers extends Model
{
    protected $primaryKey = 'traveller_id';
    
    public function TravellersAutos(){
        return $this->hasMany('App\Models\TravellersAutos');
    }
    
    public function TravellersRoomsHotelsTrips(){
        return $this->hasMany('App\Models\TravellersRoomsHotelsTrips');
    }
    
    public function TravellersTrips(){
        return $this->hasMany('App\Models\TravellersTrips');
    }
    
    public function CreateUsersTable(){
        return $this->belongsTo('App\Models\CreateUsersTable');
    }
}