<?php

namespace App\Repositories\Contracts;

interface AutoRepository
{
    public function __contruct();

    public function GetAllTravelersByName();
    
    public function GetAllTravelersByAuto();
}

