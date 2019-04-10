<?php

namespace App\Repositories\Eloquent;
use App\Repositories\Contracts\AutoRepository;
use App\Models\Auto;

class EloquentAuto implements AutoRepository
{
    private $autoModel;
    
    public function __contruct(auto $model){
        $this->autoModel = $model;
    }

    public function GetAllTravelersByName($sName){
        $db = $this->db->pdo;
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $sSqlQuery = "SELECT * FROM auto WHERE auto_name = :sName";
            $oStmt = $db->prepare($sSqlQuery);
            $oStmt->bindParam(':sName', $sName);
            $oStmt->execute();
            $aAuto = $oStmt->fetch(PDO::FETCH_ASSOC);
            return $aAuto;
        } catch (PDOException $oEx) {
            return $oEx->getMessage();
        }
    }
    
    public function GetAllTravelersByAuto($iAutoId){
        $db = $this->db->pdo;
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $sSqlQuery = "SELECT * FROM auto WHERE auto_id = :iAutoId";
            $oStmt = $db->prepare($sSqlQuery);
            $oStmt->bindParam(':iAutoId', $iAutoId);
            $oStmt->execute();
            $aAuto = $oStmt->fetch(PDO::FETCH_ASSOC);
            return $aAuto;
        } catch (PDOException $oEx) {
            return $oEx->getMessage();
        }
    }
}