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
        
    }

}

