<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Repositories\Eloquent;
use App\Repositories\Contracts\VervoerRepositoryBackend;
use App\Models\Vervoer;

class EloquentVervoerBackend implements VervoerRepositoryBackend
{
    private $model;

    public function __construct(Vervoer $model) {
        $this->model = $model;
    }
    
    public function getVervoerContent() {
        return \Illuminate\Support\Facades\DB::table('trips')->select("trip_id", "transportation_info")->where(["trip_id" => 1])->get();
    }

    public function updateVervoerContent(array $vervoerContent) {
        return \Illuminate\Support\Facades\DB::table('trips')->where(["trip_id" => $vervoerContent["id"]])->update(["transportation_info" => $vervoerContent["content"]]);
        //return $vervoerContent;
    }

}