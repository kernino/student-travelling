<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function getContacts(Request $request){
        
        if ($request->session()->has('code')) {
            
            $tripCode = $request->session()->get('code');
        
            $aTrip = DB::table('trips')->where('travel_code', '=', $tripCode)->first();  
            
            $aEmergencyNumbers = $this->getEmergencyNumbers($aTrip->trip_id);
            
            $aTravellersPerTrip = DB::table('travellers_trips')->where('trip_id', '=', $aTrip->trip_id)->get();
            
            foreach ($aTravellersPerTrip as $aTravellerPerTrip)
            {
                $aTraveller = DB::table('travellers')->where('traveller_id', '=', $aTravellerPerTrip->traveller_id)->first();
                
                if (isset($aTraveller->major_name))
                {
                    $aTravellersInTrip['students'][] = $aTraveller;
                }
                else
                {
                    $aTravellersInTrip['mentors'][] = $aTraveller;
                }
            }   
            
            if(isset($aTravellersInTrip)){
                return view('partials.frontend.contacten', ["aContactData" => $aTravellersInTrip, "aEmergencyNumbers" => $aEmergencyNumbers]);               
            }
            else{
                return view('partials.frontend.contacten', ["aContactData" => null, "aEmergencyNumbers" => $aEmergencyNumbers]);
            }
        }
        else
        {
            return view('partials.frontend.inlogScherm', ["bError" => false]);
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
