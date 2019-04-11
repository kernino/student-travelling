<?php

namespace App\Repositories\Contracts;

interface TravelersRepository
{
    public function __construct(travelers $model);
    
    public function GetTravelersByName($sName);
}

