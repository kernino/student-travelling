<?php

namespace App\Repositories\Eloquent;
use App\Repositories\Contracts\AlgemeneInfoRepository;
use App\Models\Info;
use Illuminate\Support\Facades\DB;

class EloquentAlgemeneInfo implements AlgemeneInfoRepository
{
    private $InfoModel;
    
    public function __construct(Info $model) {
        $this->InfoModel = $model;
    }
    
    public function getAlgemeneInfo(){
        $aAlgemeneInfo = DB::table('infos')->where('name', '=', 'AlgemeneInfo')->first();
        return $aAlgemeneInfo;
    }
}