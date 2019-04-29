<?php

namespace App\Repositories\Contracts;

interface AutoRepository
{
    public function __contruct(auto $model);

    public function GetAllTravelersByName($sName);
    
    public function GetAllTravelersByAuto($iAutoId);
}