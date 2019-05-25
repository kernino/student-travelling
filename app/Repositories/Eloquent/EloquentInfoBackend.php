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

    public function getInfo() {
        
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

