<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autos extends Model
{
    protected $primaryKey = 'auto_id';
    protected $fillable = ["auto_content"];


    public function AutosTrips(){
        return $this->hasMany('App\Models\AutoTrips');
    }
}