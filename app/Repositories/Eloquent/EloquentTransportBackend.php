<?php

namespace App\Repositories\Eloquent;
use App\Repositories\Contracts\TransportRepositoryBackend;
use App\Transport;

class EloquentTransportBackend implements TransportRepositoryBackend
{
    private $TransportBackendModel;
    
    public function __construct($model) {
        $this->TransportBackendModel = $model;
    }

    public function getTransportContent() {
        
    }

    public function saveTransportContent(string $TransportContent) {
        return $this->model->create($TransporttContent);
    }

    

}