<?php

namespace App\Http\Controllers;
use App\Repositories\Contracts\PlanningRepository;
use App\Models\Planning;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PlanningController extends Controller
{
    /**
     *
     * @var PlanningRepository
     */
    private $planning;
    
    /**
     * PlanningController Constructor
     * 
     * @param PlanningRepository $Planning
     */
    public function __construct(PlanningRepository $planning) 
    {
       $this->planning = $planning;
    }
    
//    public function GetTrip(){
//        $aPlanning = $this->planning->GetTrip($sTrip);
//        return view('planning.view', array('planning' => $aPlanning));
//    }
    
    public function GetTripPlanning(Request $request){
         if ($request->session()->has('code')) {
            
            $tripCode = $request->session()->get('code');
            $trip = DB::table('trips')->where('travel_code', '=', $tripCode)->first();  
            
            $aPlanning = $this->planning->GetTripPLanning($trip->trip_id);
            
            return view('partials.frontend.planning', ["aPlanning" => $aPlanning]);
        }
        else
        {
            return redirect()->route('login');
        }
    }
    
    public function GetAllPlanningen(){
        $listOfPlanningen = $this->planning->GetAllPlanningen();
        return view('partials.backend.planning', array('listOfPlanningen' => $listOfPlanningen));
    }
}
