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

    public function getAlgemeneInfo() {
        return \Illuminate\Support\Facades\DB::table('infos')->select("info_id", "content")->where(["info_id" => 1])->get();
    }

    public function updateAlgemeneInfo(array $infoContent) {
        return \Illuminate\Support\Facades\DB::table('infos')->where(["info_id" => $infoContent["id"]])->update(["content" => $infoContent["content"]]);
    }

}

