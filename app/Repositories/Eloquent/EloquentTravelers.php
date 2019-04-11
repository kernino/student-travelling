<?php

namespace App\Repositories\Eloquent;
use App\Repositories\Contracts\TravelersRepository;
use App\Models\Travelers;

class EloquentTravelers implements TravelersRepository{
    private $travelersModel;
    
    public function __construct(travelers $model) {
        $this->travelersModel = $model;
    }
    
    public function GetTravelersByName($sName) {
        $db = $this->db->pdo;
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $sSqlQuery = "SELECT * FROM travelers WHERE travelers_name = :sName";
            $oStmt = $db->prepare($sSqlQuery);
            $oStmt->bindParam(':sName', $sName);
            $oStmt->execute();
            $aAuto = $oStmt->fetch(PDO::FETCH_ASSOC);
            return $aTravelers;
        } catch (PDOException $oEx) {
            return $oEx->getMessage();
        }
    }
    
    public function GetTravelers(){
        $db = $this->db->pdo;
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $sSqlQuery = "SELECT * FROM travelers";
            $oStmt = $db->prepare($sSqlQuery);
            $oStmt->execute();
            $aAuto = $oStmt->fetch(PDO::FETCH_ASSOC);
            return $aTravelers;
        } catch (PDOException $oEx) {
            return $oEx->getMessage();
        }
    }
}