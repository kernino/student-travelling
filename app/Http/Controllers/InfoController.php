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
    
    public function index() {
        $info_content = $this->Info->getAlgemeneInfo();
        //return $info_content;
       
        return view('partials.backend.info', array("info_content" => $info_content[0]));
    }
    
    public function createInfo() {
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
    
    public function showAlgemeneInfo(Request $request){
        if ($request->session()->has('code')) {
            
            $tripCode = $request->session()->get('code');
            $trip = DB::table('trips')->where('travel_code', '=', $tripCode)->first();  
            
            if(isset($trip)){
                $sAlgemeneInfo = $this->infoFrontend->getAlgemeneInfo();
                
                if (isset($sAlgemeneInfo)){
                    return view('partials.frontend.algemeneInfo', ["sAlgemeneInfo" => $sAlgemeneInfo]);
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
 
}
