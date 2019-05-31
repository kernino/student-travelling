<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\InfoRepositoryBackend;

class InfoController extends Controller
{
    private $Info;
    
    public function __construct(InfoRepositoryBackend $Info) {
        $this->Info = $Info;
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
                if($this->info->updateAlgemeneInfo($infoContent)) {
                    return redirect()->route('info_backend');
                }
                return  redirect()->route('info_backend')->withErrors(["Opslaan mislukt" => "Kan de aanpassing niet opslaan"]);
            }
        }
        
        return redirect()->route('info_backend');
    }
}
