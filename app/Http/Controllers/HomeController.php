<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    
    public function __construct() {

    }
    
    public function saveTravelCode(Request $request)
    {
        $trip = DB::table('trips')->where('travel_code', '=', $request->input("code"))->first();
        
        if ($trip == null){
            $bError = true;
            $sErrorMessage = "Trip not found";
            return view('partials.frontend.inlogScherm', ["bError" => $bError]);
        }
        else{
            $request->session()->put('code', $trip->travel_code);
        
            return redirect()->route('home');
        }
    }
    
    public function readAndAccepted(Request $request)
    {
        $request->session()->put('regulations', "accepted");
        
        return redirect()->route('home');
    }
    
    public function getHomeData(Request $request){
        
        if ($request->session()->has('code')) {
            if (!$request->session()->has('regulations')) {   
                
                $sAccepted = "AlgemeneAfspraken";

                $tripCode = $request->session()->get('code');

                $aHomeData = DB::table('trips')->where('travel_code', '=', $tripCode)->first(); 

                $aTravellers = DB::table('travellers_trips')->where('trip_id', '=', $aHomeData->trip_id)->get();  

                foreach ($aTravellers as $aTraveller)
                {
                    $aEmergencyNumbers[] = DB::table('travellers')->where('traveller_id', '=', $aTraveller->traveller_id)->whereNull('major_name')->first();
                }             

                if (isset($aEmergencyNumbers)){
                    return view('partials.frontend.index', ["aHomeData" => $aHomeData, "sAccepted" => $sAccepted, "aEmergencyNumbers" => $aEmergencyNumbers]);  
                }
                else{
                    return view('partials.frontend.index', ["aHomeData" => $aHomeData, "sAccepted" => $sAccepted, "aEmergencyNumbers" => null]);  
                }  
                              
            }
            else
            {
                    $tripCode = $request->session()->get('code');

                    $aHomeData = DB::table('trips')->where('travel_code', '=', $tripCode)->first();  
                    
                    $aTravellers = DB::table('travellers_trips')->where('trip_id', '=', $aHomeData->trip_id)->get();  

                    foreach ($aTravellers as $aTraveller)
                    {
                        $aEmergencyNumbers[] = DB::table('travellers')->where('traveller_id', '=', $aTraveller->traveller_id)->whereNull('major_name')->first();
                    }
                    
                    if (isset($aEmergencyNumbers)){
                        return view('partials.frontend.index', ["aHomeData" => $aHomeData, "sAccepted" => "", "aEmergencyNumbers" => $aEmergencyNumbers]);
                    }
                    else{
                        return view('partials.frontend.index', ["aHomeData" => $aHomeData, "sAccepted" => "", "aEmergencyNumbers" => null]);
                    }             
            }
        }
        else
        {
            return view('partials.frontend.inlogScherm', ["bError" => false]);
        }
    }
    

    

}

