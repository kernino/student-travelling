<?php

namespace App\Repositories\Eloquent;
use App\Repositories\Contracts\PlanningRepository;
use App\Models\Plannings;
use Illuminate\Support\Facades\DB;

class EloquentPlanning implements PlanningRepository
{
    /**
     *
     * @var Planning 
     */
    private $planningModel;
    
    /**
     * EloquentPlanning constructor
     * 
     * @param Planning $model
     */
    
    public function __construct(Plannings $model) {
        $this->planningModel = $model;
    }
    
    public function GetTripPLanning($tripId) {
        
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
    
    public function GetPLanning() {
        $db = $this->db->pdo;
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $sSqlQuery = "SELECT * FROM planning";
            $oStmt = $db->prepare($sSqlQuery);
            $oStmt->execute();
            $aAuto = $oStmt->fetch(PDO::FETCH_ASSOC);
            return $aPlanning;
        } catch (PDOException $oEx) {
            return $oEx->getMessage();
        }
    }
    
    public function GetTrip($sTrip) {
        $db = $this->db->pdo;
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $sSqlQuery = "SELECT * FROM planning WHERE planning_trip = :sTrip";
            $oStmt = $db->prepare($sSqlQuery);
            $oStmt->bindParam(':sTrip', $sTrip);
            $oStmt->execute();
            $aAuto = $oStmt->fetch(PDO::FETCH_ASSOC);
            return $aPlanning;
        } catch (PDOException $oEx) {
            return $oEx->getMessage();
        }
    }
    
    public function GetAllPlanningen() {
        return $this->planningModel->get();
    }
}