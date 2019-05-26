<?php

namespace App\Repositories\Eloquent;
use App\Repositories\Contracts\PlanningRepository;
use App\Models\DaysPlannings;
use App\Models\Trips;

class EloquentPlanning implements PlanningRepository
{
    
    private $model;
    private $tripModel;
    
    public function __construct(DaysPlannings $model, Trips $tripModel) {
        $this->model = $model;
        $this->tripModel = $tripModel;
    }
        
    public function GetPLanning($id) {
        return $this->findById($id);
        
    }
    
    public function GetAllPlanningen() {
        return $this->model->get();
    }
    
    public function GetTripData(){
        return $this->tripModel->get();
    }
}
