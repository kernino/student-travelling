<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plannings extends Model
{
    protected $primaryKey = 'planning_id';
    
    public function DaysPlannings(){
        return $this->hasMany('App\Models\DayPlanning');
    }
}