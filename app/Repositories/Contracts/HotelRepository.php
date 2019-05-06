<?php

namespace App\Repositories\Contracts;

interface HotelRepository
{
    public function __construct (hotel $model);
    
    public function GetTravellersByName($sName);
    
    public function GetAllTravellersPerRoom();
    
    public function GetAllHotelData();
}
