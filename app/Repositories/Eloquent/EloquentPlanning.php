<?php

namespace App\Repositories\Eloquent;
use App\Repositories\Contracts\PlanningRepository;
use App\Models\Planning;

class EloquentPlanning implements PlanningRepository
{
    private $planningModel;
    
    public function __construct(planning $model) {
        $this->planningModel = $model;
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
    
    public function GetTrips($sTrip) {
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
}