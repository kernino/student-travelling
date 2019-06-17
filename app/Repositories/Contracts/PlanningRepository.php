<?php

namespace App\Repositories\Contracts;

interface PlanningRepository
{  
    public function GetPLanning($id);   
    
    public function GetAllPlanningen();
    
    public function GetTripData();
    
    public function UpdatePlanning(array $aPlanningContent);
    
    public function CreatePlanning(array $aPlanningContent);
    
    public function DeletePlanning($id);
}
