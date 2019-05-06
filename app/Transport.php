<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transport_content',
    ];
}
