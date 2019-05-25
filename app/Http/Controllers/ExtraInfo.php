<?php

namespace App\Http\Controllers;
use App\Repositories\Contracts\ExtraInfoRepositoryBackend;
use App\Models\ExtraInfo;

use Illuminate\Http\Request;

class ExtraInfo extends Controller
{
    private $autoBackend;
    
    public function __construct(AutoRepositoryBackend $autoBackend) {
        $this->autoBackend = $autoBackend;
    }
    
    // functions backend
    public function index() {
        //return $this->autoBackend->getAutoContent();
        return view('partials.backend.extraVervoersInformatie', array('AutoContent' => $this->autoBackend->getAutoContent()));
    }
    
    public function create() {
        
        // valideer het request, het transport_content veld moet ingevuld zijn
        $this->validate(request(), [
            'auto_content' => 'required'
        ]);
        
        // als de actie opslaan is, sla de gegevens op in de database
        // in elk ander geval, ga terug naar het hoofdscherm
        if(request()->action == "Opslaan") {
            if(request()->auto_id == "") {
                $this->autoBackend->createAutoContent(request()->auto_content);
                return redirect()->route('vervoer_backend');
            } else {
                $autoUpdate = $this->autoBackend->updateAutoContent(array('auto_id' => request()->auto_id, "auto_content" => request()->auto_content));
                if($autoUpdate === true) {
                    return redirect()->route('vervoer_backend');
                } else {
                    return redirect()->route('vervoer_backend')->withErrors(["update error" => $autoUpdate]);
                }
            }
        } else {
            return redirect()->route('vervoer_backend');
        }
    }
}
