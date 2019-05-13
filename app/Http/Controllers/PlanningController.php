<?php

namespace App\Http\Controllers;
use App\Repositories\Contracts\PlanningRepository;
use App\Models\Planning;

class PlanningController extends Illuminate\Routing\Controller
{
    /**
     *
     * @var PlanningRepository
     */
    private $planning;
    
    /**
     * PlanningController Constructor
     * 
     * @param PlanningRepository $planning
     */
    public function __construct(PlanningRepository $planning) 
    {
       $this->planning = $planning;
    }
    
    public function GetTrip(){
        $aPlanning = $this->planning->GetTrips($sTrip);
        return view('planning.view', array('planning' => $aPlanning));
    }
    
    public function GetAllPlanningen(){
        $listOfPlanningen = $this->planning->GetAllPlanningen();
        return view('partials.backend.planning', array('listOfPlanningen' => $listOfPlanningen));
    }
}
