<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\PlanningRepository;
use App\Models\DaysPlannings;

class PlanningController extends Controller
{
    private $planningBackend;
    
    public function __construct(PlanningRepository $planningBackend) {
        $this->planningBackend = $planningBackend;
    } 
    
  
    public function GetPlanning(){
        ;
    }
   
    public function GetTrip($sTrip){
        $aPlanning = $this->planningBackend->GetTrip($sTrip);
        return view('planning.view', array('planning' => $aPlanning));
    }
    
    public function GetAllPlanningen(){
        $listOfPlanningen = $this->planningBackend->GetAllPlanningen();
        return view('partials.backend.planning', array('listOfPlanningen' => $listOfPlanningen));
    }
    
    
}
