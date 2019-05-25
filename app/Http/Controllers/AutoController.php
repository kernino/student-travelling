<?php

namespace App\Http\Controllers;
use App\Repositories\Contracts\AutoRepositoryBackend;
use App\Models\Autos;

class AutoController extends Controller
{
    private $autoBackend;
    private $auto;
    
    public function __construct(AutoRepositoryBackend $autoBackend, AutoRepository $auto) {
        $this->autoBackend = $autoBackend;
        $this->auto = $auto;
    }
    
    public function autoData(Request $request){
        
        if ($request->session()->has('code')) {
            
            $tripCode = $request->session()->get('code');
            $trip = DB::table('trips')->where('travel_code', '=', $tripCode);  
            
            $aAutoData = $this->auto->GetAllTravelersByAuto($trip->trip_id);

            return view('partials.frontend.vervoerInfo', ["aCars" => $aAutoData]);
        }
        else
        {
            return redirect()->route('login');
        }
    }
    
    // functions backend
    public function index() {
        //return $this->autoBackend->getAutoContent();
        return view('partials.backend.auto', array('AutoContent' => $this->autoBackend->getAutoContent()));
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
            return redirect()->route('home_backend');
        }
    }
}