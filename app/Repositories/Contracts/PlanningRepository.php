<?php

namespace App\Repositories\Contracts;

interface PlanningRepository
{
    public function GetPLanning();
    
    public function GetTrip($sTrip);
    
    public function GetTripPLanning($tripId);
    
    public function GetAllPlanningen();
}