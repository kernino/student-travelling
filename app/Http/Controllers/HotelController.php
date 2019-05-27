<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\HotelRepository;
use App\Models\Hotels;
use Illuminate\Support\Facades\DB;


class HotelController extends Controller
{
    private $hotel;
    
    public function __construct(HotelRepository $hotel) {
        $this->hotel = $hotel;   
        
    }
        
    public function getHotelData(Request $request){
        
        if ($request->session()->has('code')) {
            
            $tripCode = $request->session()->get('code');
            $trip = DB::table('trips')->where('travel_code', '=', $tripCode)->first();  
            
            $aRoomInfo = $this->hotel->GetAllTravellersPerRoom(1, $trip->trip_id);
            $aHotels = $this->hotel->GetAllHotelData(); 
            
            return view('partials.frontend.hotelInfo', ["aRoomInfo" => $aRoomInfo, "aHotels" => $aHotels]);
        }
        else
        {
            return redirect()->route('login');
        }
    }
    
    public function hotelBackEnd()
    {
            $aHotels = $this->hotel->GetAllHotelData();
            return view('partials.backend.hotel', ["aHotels" => $aHotels]);
    }
}
