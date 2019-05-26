<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\InfoRepositoryBackend;

class InfoController extends Controller
{
    private $Info;
    
    public function __construct(InfoRepositoryBackend $Info) {
        $this->Info = $Info;
    }
    
    public function index() {
        return view('partials.backend.info');
    }
    
    public function createInfo() {
        // valideer het request, het transport_content veld moet ingevuld zijn
        $this->validate(request(), [
            'info_content' => 'required',
        ]);
        
        
        
        if(request()->save == "Opslaan") {            
            $infoContent["type"] = "general_info";
            $infoContent["info"] = request()->info_content;
            
            return $this->Info->saveInfo($infoContent);
            
            
            /*if(request()->info_type == "algemeneInfo") {
                $infoContent["type"] = "general_info";
                $infoContent["info"] = request()->info_content;
                $infoContent["flight"] = request()->flight_content;
                //return $this->Info->saveInfo($infoContent);
                return request();
            }
            return redirect()->route('info_backend');*/
            
        } else {
            return redirect()->route('info_backend');
        }
    }
}
