<?php

namespace App\Repositories\Eloquent;
use App\Repositories\Contracts\AlgemeneInfoRepositoryBackend;
use App\Models\AlgemeneInfoBackend;

class EloquentAlgemeneInfoBackend implements AlgemeneInfoRepositoryBackend
{
    private $algemeneInfoModelBackend;
    
    public function __construct(algemeneInfoBackend $model) {
        $this->algemeneInfoModelBackend = $model;
    }
    
    public function getAlgemeneInfo(){
        return $this->model->where()->get(); // "where" nog aanpassen
     }
     
    public function saveAlgemeneInfo(string $sHtmlEditorContent){
       return $this->model->create($sHtmlEditorContent);
    }
}

