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
            
            $aAutoData = $this->auto->GetAllTravelersByAuto($trip->trip_id);

            return view('partials.frontend.vervoerInfo', ["aCars" => $aAutoData]);
        }
        else
        {
            return redirect()->route('login');
        }
    }
    
    
}
