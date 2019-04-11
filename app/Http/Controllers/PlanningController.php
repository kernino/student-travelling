<?php

namespace App\Http\Controllers;

class PlanningController extends Illuminate\Routing\Controller
{
    private $planning;
    
    public function GetTrips(){
        $aPlanning = $this->planning->GetTrips($sTrip);
        return view('planning.view', array('planning' => $aPlanning));
    }
}
