<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Infos extends Model
{
    protected $primaryKey = 'info_id';
    protected $fillable = ["info_content"];
}