<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\HotelRepository;
use App\Models\Hotels;

class HotelController extends Controller
{
        private $hotel;
    
    public function __construct(HotelRepository $hotel) {
        $this->hotel = $hotel;
    }
    
    public function hotelData(){
        
        $aRoomInfo = $this->hotel->GetAllTravellersPerRoom();
        $aHotels = $this->hotel->GetAllHotelData();
        
        return view('partials.frontend.hotelInfo', ["aRoomInfo" => $aRoomInfo, "aHotels" => $aHotels]);
    }
    
    public function hotelBackEnd()
    {
         $aHotels = $this->hotel->GetAllHotelData();
        
        return view('partials.backend.hotel', ["aHotels"=>$aHotels]);
    }
}
