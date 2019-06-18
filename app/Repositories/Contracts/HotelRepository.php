<?php

namespace App\Repositories\Contracts;

interface HotelRepository
{
    
    public function GetAllTravellersPerRoom($hotel_id, $trip_id);
    
    public function GetAllHotelData($trip_id);
    
    public function UpdateHotelInformation(array $hotelContent);
}
