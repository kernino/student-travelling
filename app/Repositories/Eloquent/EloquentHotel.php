<?php

namespace App\Repositories\Eloquent;
use App\Repositories\Contracts\AlgemeneInfoRepository;
use App\Models\Hotels;

class EloquentHotel implements HotelRepository
{
    private $hotelModel;
    
    public function __construct(hotel $model) {
        $this->hotelModel = $model;
    }
    
    public function GetTravellersByName($sName){
        
    }
    
    public function GetAllTravellersPerRoom(){
        
    }
    
    public function GetAllHotelData(){
        
    }
}