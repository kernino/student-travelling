<?php

namespace App\Repositories\Contracts;

interface PlanningRepository
{
    //public function __construct(planning $model);
    
    public function GetPLanning();
    
    public function GetTrip(string $sTrip);
    
    public function GetAllPlanningen();
}