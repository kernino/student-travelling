<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlgemeneInfo extends Model
{
    protected $primaryKey = "info_id";
    
    public function Trips(){
        return $this->belongsTo('App\Models\Trips');
    }
}