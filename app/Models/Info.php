<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $primaryKey = "info_id";
    protected $fillable = ["general_info", "flight_info"];
}
