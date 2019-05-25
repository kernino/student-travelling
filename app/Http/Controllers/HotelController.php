<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\HotelRepository;
use App\Models\Hotels;

class HotelController extends Controller
{
    private $hotel;
    
    public function __construct(HotelRepository $hotel) {
        $this->hotel = $hotel;   
        
    }
        
    public function hotelData(Request $request){
        
        if ($request->session()->has('code')) {
            
            $tripCode = $request->session()->get('code');
            $trip = DB::table('trips')->where('travel_code', '=', $tripCode);  
            
            $aRoomInfo = $this->hotel->GetAllTravellersPerRoom();
            $aHotels = $this->hotel->GetAllHotelData();
            
            return view('partials.frontend.hotelInfo', ["aRoomInfo" => $aRoomInfo, "aHotels" => $aHotels]);
        }
        else
        {
            return redirect()->route('login');
        }
    }
}
