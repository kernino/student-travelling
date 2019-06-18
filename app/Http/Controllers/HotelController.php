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
            $request->
            $trip = DB::table('trips')->where('travel_code', '=', $tripCode)->first();  
            if(Input::get('id') !== null){
                $iHotel = Input::get('id');
            }
            else{
                $iHotel = 0;
            }
            
            if(isset($trip)){
                $aRoomInfo = $this->hotel->GetAllTravellersPerRoom(1, $trip->trip_id);
                $aHotels = $this->hotel->GetAllHotelData(); 
                
                if (isset($aRoomInfo) && isset($aHotels)){
                    return view('partials.frontend.hotelInfo', ["aRoomInfo" => $aRoomInfo, "aHotels" => $aHotels, "iHotel" => $iHotel]);
                }
                else if (isset($aHotels)){
                    return view('partials.frontend.hotelInfo', ["aRoomInfo" => "", "aHotels" => $aHotels, "iHotel" => -1]);
                }
                else if (isset($aRoomInfo)){
                    return view('partials.frontend.hotelInfo', ["aRoomInfo" => $aRoomInfo, "aHotels" => "", "iHotel" => -1]);
                }      
            }
            else
            {
                return view('partials.frontend.hotelInfo', ["aRoomInfo" => "", "aHotels" => "", "iHotel" => -1]);                
            }
            
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
