<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreateUsersTable extends Model
{
    protected $primaryKey = 'user_id';
    
    public function Travellers(){
        return $this->hasMany('App\Models\Travellers');
    }
}