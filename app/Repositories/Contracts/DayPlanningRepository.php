<?php

namespace App\Repositories\Contracts;


interface DayPlanningRepository
{
    
    public function GetTripPlanning($tripId);
    
    public function GetDayPlanning($dayPlanningId);
    
}
