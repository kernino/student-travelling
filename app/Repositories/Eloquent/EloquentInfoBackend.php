<?php

namespace App\Repositories\Eloquent;
use App\Repositories\Contracts\InfoRepositoryBackend;
use App\Models\Info;

class EloquentInfoBackend implements InfoRepositoryBackend
{
    private $model;
    
    public function __construct(Info $model) {
        $this->model = $model;
    }

    public function getAlgemeneInfo($sContent) {
        $db = $this->db->pdo;
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $sSqlQuery = "SELECT * FROM infos WHERE content =: sContent";
            $oStmt = $db->prepare($sSqlQuery);
            $oStmt->bindParam(':sContent', $sContent);
            $oStmt->execute();
            $aAuto = $oStmt->fetch(PDO::FETCH_ASSOC);
            return $aAlgemeneInfo;
        } catch (PDOException $oEx) {
            return $oEx->getMessage();
        }
    }

    public function saveInfo(array $infoContent) {
        if( ($this->model->create(["general_info" => $infoContent["info"], "flight_info" => $infoContent["flight"]])) )
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}

