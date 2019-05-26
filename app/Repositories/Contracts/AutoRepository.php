<?php

namespace App\Repositories\Contracts;

interface AutoRepository
{
    public function GetAllTravelersByName($sName);
    
    public function GetAllTravelersByAuto($trip);
}
}
