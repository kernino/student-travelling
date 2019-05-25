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
    
    
}
