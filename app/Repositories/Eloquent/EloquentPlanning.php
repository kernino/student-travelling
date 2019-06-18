<?php

namespace App\Repositories\Eloquent;
use App\Repositories\Contracts\PlanningRepository;
use App\Models\DaysPlannings;
use App\Models\Trips;
use Illuminate\Support\Facades\DB;

class EloquentPlanning implements PlanningRepository
{
    //backend
    private $model;
    private $tripModel;
    
    public function __construct(DaysPlannings $model, Trips $tripModel) {
        $this->model = $model;
        $this->tripModel = $tripModel;
    }
        
    public function GetPLanning($id) {
        return DB::table("days_plannings")->where("day_planning_id", "=", $id)->first();
    }
    
    public function GetAllPlanningen() {
        return $this->model->get();
    }
    
    public function GetTripData(){
        return $this->tripModel->get();
    }
    
    public function UpdatePlanning(array $aPlanningContent) {
        return DB::table("days_plannings")->where(["day_planning_id" => $aPlanningContent["planningId"]])->update(["name" => $aPlanningContent["planningName"], 
            "end_location" => $aPlanningContent["planningLocation"], "date" => $aPlanningContent["planningDate"], "highlight" => $aPlanningContent["planningHighlight"],
                "description" => $aPlanningContent["planning_content"]]);
    }
    
    public function CreatePlanning(array $aPlanningContent) {
        
        DB::table("days_plannings")->insert(["name" => $aPlanningContent["planningName"], 
            "end_location" => $aPlanningContent["planningLocation"], "date" => $aPlanningContent["planningDate"], "highlight" => $aPlanningContent["planningHighlight"],
                "description" => $aPlanningContent["planning_content"]]);
        $data = DB::table("days_plannings")->orderBy("day_planning_id", 'desc')->first();
        DB::table("day_plannings_trips")->insert(["trip_id" => "1", "day_planning_id" => $data->day_planning_id]);
        return true;
    }
    
    public function DeletePlanning($id) {
        DB::table("day_plannings_trips")->where("day_planning_id", "=", $id)->delete();
        DB::table("days_plannings")->where("day_planning_id", "=", $id)->delete();
        return true;
    }
}
