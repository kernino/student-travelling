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
            
            $aEmergencyNumbers = $this->getEmergencyNumbers($trip->trip_id);
            
            $sTransportationInfo = $trip->transportation_info;
            
            $aAutoData = $this->auto->GetAllTravelersByAuto($trip->trip_id);
            
            if ($aAutoData == null){
                $bError = true;
                $sErrorMessage = "No cars found for trip".$trip->trip_id;
                
                return view('partials.frontend.vervoerInfo', ["aCars" => $aAutoData, "bError" => $bError, 
                    "sErrorMessage" => $sErrorMessage, "sTransportationInfo" => $sTransportationInfo, "aEmergencyNumbers" => $aEmergencyNumbers]);
            }
            else{
                return view('partials.frontend.vervoerInfo', ["aCars" => $aAutoData, "bError" => false, 
                    "sErrorMessage" => "", "sTransportationInfo" => $sTransportationInfo, "aEmergencyNumbers" => $aEmergencyNumbers]);
            }

            
        }
        else
        {
            return redirect()->route('login');
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
