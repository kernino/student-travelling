<?php

namespace App\Repositories\Eloquent;
use App\Repositories\Contracts\AutoRepository;
use App\Models\Autos;
use Illuminate\Support\Facades\DB;

class EloquentAuto implements AutoRepository
{
    private $autoModel;
    
    public function __contruct(Autos $model){
        $this->autoModel = $model;
    }

    public function GetAllTravelersByName($sName){
        
    }
    
    public function GetAllTravelersByAuto($trip){
        $autosPerTrip = DB::table('autos_trips')->where('trip_id', '=', $trip)->get();
        
        foreach ($autosPerTrip as $autoPerTrip)
        {
            $travellerAutos = DB::table('travellers_autos')->where('auto_trip_id', '=', $autoPerTrip->auto_trip_id)->get();
            
            foreach ($travellerAutos as $travellerAuto)
            {
                if ($travellerAuto->role == 'driver')
                {
                    $travellersPerAuto[$autoPerTrip->auto_id]['drivers'][] = DB::table('travellers')->where('traveller_id', '=', $travellerAuto->traveller_id)->first();
                }
                else if ($travellerAuto->role == 'passenger')
                {
                    $travellersPerAuto[$autoPerTrip->auto_id]['passengers'][] = DB::table('travellers')->where('traveller_id', '=', $travellerAuto->traveller_id)->first();
                }
            }
        }
      
        ksort($travellersPerAuto);
        
        return $travellersPerAuto;
    }
}
