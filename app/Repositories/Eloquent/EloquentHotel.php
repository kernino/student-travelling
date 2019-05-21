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
    
    public function GetAllTravellersPerRoom($hotel_id=1, $trip_id=1){
        
        $travellers = DB::table('travellers')->get();
        $hotel = DB::table('hotels_trips')->where('hotel_id', '=', $hotel_id)->where('trip_id', '=', $trip_id)->first();   
        $rooms = DB::table('rooms_hotels_trips')->where('hotel_trip_id', '=', $hotel->hotel_trip_id)->get();
           
        foreach ($rooms as $room)
        {
            $travellerRooms = DB::table('travellers_rooms')->where('room_hotel_trip_id', '=', $room->room_hotel_trip_id)->get();
            
            foreach ($travellerRooms as $travellerRoom)
            {
                $travellersPerRoom[$room->room_number][] = DB::table('travellers')->where('traveller_id', '=', $travellerRoom->traveller_id)->first();
            }
        }
      
        ksort($travellersPerRoom);
        
        return $travellersPerRoom;
    }
    
    public function GetAllHotelData($trip_id=1){
        $hotels = DB::table('hotels_trips')->where('trip_id', '=', $trip_id)->get();
        
        foreach ($hotels as $hotel)
        {
            $aHotels[] = DB::table('hotels')->where('hotel_id', '=', $hotel->hotel_id)->first();
        }
        
        return $aHotels;
    }
}