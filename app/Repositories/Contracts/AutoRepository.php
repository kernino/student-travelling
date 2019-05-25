<?php

namespace App\Repositories\Contracts;

interface AutoRepository
{
    public function __construct(auto $model);

    public function GetAllTravelersByName($sName);
    
    public function GetAllTravelersByAuto($trip);
}
