<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\HotelRepository;
use App\Models\Hotels;

class HomeController extends Controller
{
        private $hotel;
    
    public function __construct(HotelRepository $hotel) {
        $this->hotel = $hotel;
    }
    
    public function getHomeData(){
        $aHomeData = array(
            'title' => "USA2019",
            'place' => "Verenigde Staten",
            'start_date' => "10/05/2019",
            'end_date' => "24/05/2019",
            'travelcode' => "1234",
        );
        
        return view('partials.frontend.index', ["aHomeData" => $aHomeData]);
    }
    
    public function hotelData(){
        
        $aRoomInfo = $this->hotel->GetAllTravellersPerRoom();
        $aHotels = $this->hotel->GetAllHotelData();
        
        return view('partials.frontend.hotelInfo', ["aRoomInfo" => $aRoomInfo, "aHotels" => $aHotels]);
    }
}

