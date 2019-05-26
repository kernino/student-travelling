<?php

namespace App\Repositories\Contracts;

interface PlanningRepository
{  
    public function GetPLanning($id);   
    
    public function GetAllPlanningen();
    
    public function GetTripData();
}
