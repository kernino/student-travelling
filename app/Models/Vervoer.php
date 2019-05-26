<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vervoer extends Model
{
    protected $primaryKey = 'vervoer_id';
    protected $fillable = ["vervoer_content"];
}