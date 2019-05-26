<?php

namespace App\Repositories\Eloquent;
use App\Repositories\Contracts\AlgemeneInfoRepository;
use App\Models\AlgemeneInfo;

class EloquentAlgemeneInfo implements AlgemeneInfoRepository
{
    private $AlgemeneInfoModel;
    
    public function __construct(AlgemeneInfo $model) {
        $this->AlgemeneInfoModel = $model;
    }
    
    public function getAlgemeneInfo(){
        $aAlgemeneInfo = DB::table('infos')->where('name', '=', 'Algemene Info')->first();
        return $aAlgemeneInfo;
    }
}