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
                return view('partials.frontend.contacten', ["aContactData" => $aTravellersInTrip]);               
            }
            else{
                return view('partials.frontend.contacten', ["aContactData" => null]);
            }
        }
        else
        {
            return view('partials.frontend.inlogScherm', ["bError" => false]);
        }
    }
}
