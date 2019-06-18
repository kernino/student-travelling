<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\HotelRepository;
use App\Models\Hotels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class HotelController extends Controller
{
    private $hotel;
    
    public function __construct(HotelRepository $hotel) {
        $this->hotel = $hotel;   
        
    }
    
    public function CheckDbConnection(){
        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            return  true ;  
        }
    }
        
    public function getHotelData(Request $request, $id = null){
        
        if ($request->session()->has('code')) {
            
            $tripCode = $request->session()->get('code');
            $trip = DB::table('trips')->where('travel_code', '=', $tripCode)->first();  
            if($id !== null){
                $iHotel = $id;
            }
            else{
                $iHotel = 0;
            }
            
            if(isset($trip)){
                $aRoomInfo = $this->hotel->GetAllTravellersPerRoom($iHotel+1, $trip->trip_id);
                $aHotels = $this->hotel->GetAllHotelData($trip->trip_id); 
                
                if (isset($aRoomInfo) && isset($aHotels)){
                    return view('partials.frontend.hotelInfo', ["aRoomInfo" => $aRoomInfo, "aHotels" => $aHotels, "iHotel" => $iHotel]);
                }
                else if (isset($aHotels)){
                    return view('partials.frontend.hotelInfo', ["aRoomInfo" => "", "aHotels" => $aHotels, "iHotel" => $iHotel]);
                }
                else{
                   return view('partials.frontend.hotelInfo', ["aRoomInfo" => "", "aHotels" => "", "iHotel" => -1]);  
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
        if($this->CheckDbConnection()){
            return redirect()->route('home_backend')->withErrors(["DB connectie mislukt" => "Kan niet met de database connecteren, controleer je configuratie"]);
        }
        else{
            $aHotels = $this->hotel->GetAllHotelData();
            return view('partials.backend.hotel', ["aHotels" => $aHotels]);
        }
    }
}
