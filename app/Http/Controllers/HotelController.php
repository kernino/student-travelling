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
            $no_hotel = "!!! No hotel selected !!!";
            $hotel_info=null;
            if(isset(request()->action))
            {
                if(request()->action == "Opslaan")
                {
                    if(request()->hotel_id!=null)
                    {
                    $hotelContent["content"]= request()->hotel_content;
                    $hotelContent["ID"]= request()->hotel_id;
                    var_dump(request()->hotel_id);
                    $this->hotel->UpdateHotelInformation($hotelContent);
                    $hotel_info = DB::table("hotels")->where("hotel_id","=",request()->hotel_id)->get();
                    }
                }
                else if(request()->action =="Annuleren")
                {
                    if(request()->hotel_id!=null)
                    {
                    $hotel_info = DB::table("hotels")->where("hotel_id","=",request()->hotel_id)->get();
                    }
                }
                else
                    {
                        $hotel_info = DB::table("hotels")->where("hotel_name","=", request()->action)->get();
                    }
            }
            $aHotels = $this->hotel->GetAllHotelData(1);
            return view('partials.backend.hotel', ["aHotels" => $aHotels, "hotel_info" => $hotel_info, "no_hotel" =>$no_hotel]);
    }
}
