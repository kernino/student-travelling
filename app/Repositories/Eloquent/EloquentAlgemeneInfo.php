<?php

namespace App\Repositories\Eloquent;
use App\Repositories\Contracts\AlgemeneInfoRepository;
use App\Models\AlgemeneInfo;

class EloquentAlgemeneInfo implements AlgemeneInfoRepository
{
    private $algemeneInfoModel;
    
    public function __construct(algemeneInfo $model) {
        $this->algemeneInfoModel = $model;
    }
    
    public function getAlgemeneInfo(){
        $db = $this->db->pdo;
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $sSqlQuery = "SELECT * FROM algemeneInfo";
            $oStmt = $db->prepare($sSqlQuery);
            $oStmt->execute();
            $aAlgemeneInfo = $oStmt->fetch(PDO::FETCH_ASSOC);
            return $aAlgemeneInfo;
        } catch (PDOException $oEx) {
            return $oEx->getMessage();
        }
    }
}