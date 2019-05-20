<?php

namespace App\Repositories\Eloquent;
use App\Repositories\Contracts\HotelRepository;
use App\Models\Hotels;
use Illuminate\Support\Facades\DB;

class EloquentHotel implements HotelRepository
{
    private $hotelModel;
    
    public function __construct(Hotels $model) {
        $this->hotelModel = $model;
    }
    
    public function GetTravellersByName($sName){
        $travellers = DB::table('travellers')->get();
        return $travellers;
    }
    
    public function GetAllTravellersPerRoom(){
        $travellers = DB::table('travellers')->get();

        foreach ($travellers as $traveller)
        {
            $aRooms[] = DB::table('travellers_rooms')->where('traveller_id', '=', $traveller->traveller_id)->first();   
        }
        
        foreach ($aRooms as $aRoom)
        {
            $travellersPerRoom[$aRoom->room_id][] = DB::table('travellers')->where('traveller_id', '=', $aRoom->traveller_id)->first();
        }
        ksort($travellersPerRoom);
        
        return $travellersPerRoom;
    }
    
    public function GetAllHotelData(){
        return DB::table('hotels')->get();
    }
}