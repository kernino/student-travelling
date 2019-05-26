<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\PlanningRepository;
use App\Repositories\Contracts\DayPlanningRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class PlanningController extends Controller
{
    private $planningBackend;
    private $planningFrontend;


    public function __construct(PlanningRepository $planningBackend, DayPlanningRepository $planningFrontend) {
        $this->planningBackend = $planningBackend;
        $this->planningFrontend = $planningFrontend;
    } 


    public function GetAllPlanningen(){
        $listOfPlanningen = $this->planningBackend->GetAllPlanningen();
        return view('partials.backend.planning', array('listOfPlanningen' => $listOfPlanningen));
    }
    
    public function GetTripPlanning(Request $request){
         if ($request->session()->has('code')) {
            
            $tripCode = $request->session()->get('code');
            $trip = DB::table('trips')->where('travel_code', '=', $tripCode)->first();  
            
            $aPlanning = $this->planningFrontend->GetTripPLanning($trip->trip_id);
            
            return view('partials.frontend.planning', ["aPlanning" => $aPlanning]);
        }
        else
        {
            return redirect()->route('login');
        }
    }
}   

    


