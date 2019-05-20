<?php

namespace App\Repositories\Eloquent;
use App\Repositories\Contracts\AutoRepository;
use App\Models\Auto;

class EloquentAuto implements AutoRepository
{
    private $autoModel;
    
    public function __construct(auto $model){
        $this->autoModel = $model;
    }

    public function GetAllTravelersByName($sName){
        
    }
    
    public function GetAllTravelersByAuto($iAutoId){
        
    }
}