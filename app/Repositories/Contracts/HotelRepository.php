<?php

namespace App\Repositories\Contracts;

interface HotelRepository
{
    public function GetTravellersByName(string $sName);
    
    public function GetAllTravellersPerRoom();
    
    public function GetAllHotelData();
}
