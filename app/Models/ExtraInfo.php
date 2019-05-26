<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExtraInfo extends Model
{
    protected $primaryKey = 'vliegtuig_id';
    protected $fillable = ["vliegtuig_gegevens", ""];
}
