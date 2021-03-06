<?php

namespace App\Http\Controllers;
use App\Repositories\Contracts\InfoRepositoryBackend;
use App\Repositories\Contracts\AlgemeneInfoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfoController extends Controller
{
    private $Info;
    private $infoFrontend;
    
    public function __construct(InfoRepositoryBackend $Info, AlgemeneInfoRepository $infoFrontend) {
        $this->Info = $Info;
        $this->infoFrontend = $infoFrontend;
    }
    
    public function CheckDbConnection(){
        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            return  true ;  
        }
    }
    
    public function index() {
        if($this->CheckDbConnection()){
            return redirect()->route('home_backend')->withErrors(["DB connectie mislukt" => "Kan niet met de database connecteren, controleer je configuratie"]);
        }
        else{
            $info_content = $this->Info->getAlgemeneInfo();
            //return $info_content;

            return view('partials.backend.info', array("info_content" => $info_content[0]));
        }
    }
    
    public function createInfo() {
        if($this->CheckDbConnection()){
            return redirect()->route('home_backend')->withErrors(["DB connectie mislukt" => "Kan niet met de database connecteren, controleer je configuratie"]);
        }
        else{
            // valideer het request, het info_content veld moet ingevuld zijn
            $this->validate(request(), [
                'info_content' => 'required',
                'info_id' => 'required'
            ]);

            if(request()->action == "Opslaan") {
                if(request()->info_id != "") {
                    $infoContent["content"] = request()->info_content;
                    $infoContent["id"] = request()->info_id;
                    if($this->Info->updateAlgemeneInfo($infoContent)) {
                        return redirect()->route('info_backend');
                    }
                    return  redirect()->route('info_backend')->withErrors(["Opslaan mislukt" => "Kan de aanpassing niet opslaan"]);
                }
            }

            return redirect()->route('info_backend');
        }
    }
    
    public function showAlgemeneInfo(Request $request){
        if ($request->session()->has('code')) {
            
            $tripCode = $request->session()->get('code');
            $trip = DB::table('trips')->where('travel_code', '=', $tripCode)->first();  
            
            if(isset($trip)){
                $sAlgemeneInfo = $this->infoFrontend->getAlgemeneInfo();
                $aEmergencyNumbers = $this->getEmergencyNumbers($trip->trip_id);
                if (isset($sAlgemeneInfo)){
                    return view('partials.frontend.algemeneInfo', ["sAlgemeneInfo" => $sAlgemeneInfo, "aEmergencyNumbers" => $aEmergencyNumbers]);
                }         
            }
            else
            {
                return view('partials.frontend.algemeneInfo', ["aRoomInfo" => "", "aHotels" => "", "iHotel" => -1]);                
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
