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
                $aEmergencyNumbers = $this->getEmergencyNumbers($trip->trip_id);
                
                if (isset($aRoomInfo) && isset($aHotels)){
                    return view('partials.frontend.hotelInfo', ["aRoomInfo" => $aRoomInfo, "aHotels" => $aHotels, "iHotel" => $iHotel, "aEmergencyNumbers" => $aEmergencyNumbers]);
                }
                else if (isset($aHotels)){
                    return view('partials.frontend.hotelInfo', ["aRoomInfo" => "", "aHotels" => $aHotels, "iHotel" => $iHotel, "aEmergencyNumbers" => $aEmergencyNumbers]);
                }
                else{
                   return view('partials.frontend.hotelInfo', ["aRoomInfo" => "", "aHotels" => "", "iHotel" => -1, "aEmergencyNumbers" => $aEmergencyNumbers]);  
                }           
            }
            else
            {
                return view('partials.frontend.hotelInfo', ["aRoomInfo" => "", "aHotels" => "", "iHotel" => -1, "aEmergencyNumbers" => $aEmergencyNumbers]);                
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
                    $this->hotel->UpdateHotelInformation($hotelContent);
                    $hotel_info=$this->hotel->GetHotelById(request()->hotel_id);                    }
                }
                else if(request()->action =="Annuleren")
                {
                    if(request()->hotel_id!=null)
                    {
                        $hotel_info=$this->hotel->GetHotelById(request()->hotel_id);
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
    
    private function getEmergencyNumbers($sTripId){
        
        $aTravellers = DB::table('travellers_trips')->where('trip_id', '=', $sTripId)->get();  

        foreach ($aTravellers as $aTraveller)
        {
            $aEmergencyNumbers[] = DB::table('travellers')->where('traveller_id', '=', $aTraveller->traveller_id)->whereNull('major_name')->first();
        }             

        if (isset($aEmergencyNumbers)){
            return $aEmergencyNumbers;
        }
        else{
            return null;
        } 
    }
}
