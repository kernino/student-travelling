<?php

namespace App\Http\Controllers;
use App\Repositories\Contracts\AutoRepositoryBackend;
use App\Repositories\Contracts\AutoRepository;
use App\Models\Autos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AutoController extends Controller
{
    private $autoBackend;
    private $auto;
    
    public function __construct(AutoRepositoryBackend $autoBackend, AutoRepository $auto) {
        $this->autoBackend = $autoBackend;
        $this->auto = $auto;
    }
    
    public function getAutoData(Request $request){
        
        if ($request->session()->has('code')) {
            
            $tripCode = $request->session()->get('code');
            $trip = DB::table('trips')->where('travel_code', '=', $tripCode)->first(); 
            
            $sTransportationInfo = $trip->transportation_info;
            
            $aAutoData = $this->auto->GetAllTravelersByAuto($trip->trip_id);
            
            if ($aAutoData == null){
                $bError = true;
                $sErrorMessage = "No cars found for trip".$trip->trip_id;
                
                return view('partials.frontend.vervoerInfo', ["aCars" => $aAutoData, "bError" => $bError, 
                    "sErrorMessage" => $sErrorMessage, "sTransportationInfo" => $sTransportationInfo]);
            }
            else{
                return view('partials.frontend.vervoerInfo', ["aCars" => $aAutoData, "bError" => false, 
                    "sErrorMessage" => "", "sTransportationInfo" => $sTransportationInfo]);
            }

            
        }
        else
        {
            return redirect()->route('login');
        }
    }
    
    
}
