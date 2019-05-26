<?php

namespace App\Repositories\Eloquent;
use App\Repositories\Contracts\DayPlanningRepository;
use App\Models\DaysPlannings;
use Illuminate\Support\Facades\DB;

class EloquentDayPlanning implements DayPlanningRepository
{
    
    private $model;
    

    public function __construct(DaysPlannings $model) {
        $this->model = $model;

    }
    
    public function GetTripPlanning($tripId) {
        
        $aAllPlanningsPerTrip = DB::table("day_plannings_trips")->where("trip_id", "=", $tripId)->get();
        
        foreach($aAllPlanningsPerTrip as $aPlanningPerTrip)
        {
            $aDayPlannings = DB::table("days_plannings")->where("day_planning_id", "=", $aPlanningPerTrip->day_planning_id)->get();     
            
            foreach ($aDayPlannings as $aDayPlanning)
            {
                $aPlanning[$aDayPlanning->end_location][] = $aDayPlanning; 
            }
                  
        }
        
        return $aPlanning;
    }
}
