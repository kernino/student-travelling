<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Repositories\Eloquent;
use App\Repositories\Contracts\AutoRepositoryBackend;
use App\Models\Autos;

class EloquentAutoBackend implements AutoRepositoryBackend
{
    private $model;

    public function __construct(Autos $model) {
        $this->model = $model;
    }
    
    public function getAutoContent() {
        return $this->model->where('auto_id', 1)->first();
    }

    public function createAutoContent(string $autoContent) {
        $this->model->create(['auto_content' => $autoContent]);
    }

    public function updateAutoContent(array $autoContent) {
        try {
            var_dump($autoContent);
            $auto = $this->model->findOrFail($autoContent["auto_id"]);
            $auto->auto_content = $autoContent["auto_content"];
            $auto->save();
            return true;
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

}