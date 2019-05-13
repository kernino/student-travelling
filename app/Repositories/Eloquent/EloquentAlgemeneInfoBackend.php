<?php

namespace App\Repositories\Eloquent;
use App\Repositories\Contracts\AlgemeneInfoRepositoryBackend;
use App\Models\AlgemeneInfo;

class EloquentAlgemeneInfoBackend implements AlgemeneInfoRepositoryBackend
{
    private $model;
    
    public function __construct(AlgemeneInfo $model) {
        $this->model = $model;
    }
    
    public function getAlgemeneInfo(){
        return $this->model->where('algemene_info_id')->get(); // "where" nog aanpassen
     }
     
    public function saveAlgemeneInfo(string $sHtmlEditorContent){
       return $this->model->create($sHtmlEditorContent);
    }
}

