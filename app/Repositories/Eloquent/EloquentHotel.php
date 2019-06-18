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
    
    
    public function GetAllTravellersPerRoom($hotel_id, $trip_id){
        
        $hotel = DB::table('hotels_trips')->where('hotel_id', '=', $hotel_id)->where('trip_id', '=', $trip_id)->first();
        
        if (!(isset($hotel))){
            return;
        }
        
        $rooms = DB::table('rooms_hotels_trips')->where('hotel_trip_id', '=', $hotel->hotel_trip_id)->get();
         
        if (!(isset($rooms))){
            return;
        }
        
        foreach ($rooms as $room)
        {
            $travellerRooms = DB::table('travellers_rooms')->where('room_hotel_trip_id', '=', $room->room_hotel_trip_id)->get();
            
            if (!(isset($travellerRooms))){
                return;
            }
            
            foreach ($travellerRooms as $travellerRoom)
            {
                $travellersPerRoom[$room->room_number][] = DB::table('travellers')->where('traveller_id', '=', $travellerRoom->traveller_id)->first();
            }
        }
      
        if(isset($travellersPerRoom)){
            ksort($travellersPerRoom);
        
            return $travellersPerRoom;
        }
        else{
            return null;
        }

    }
    
    public function GetAllHotelData($trip_id){
        $hotels = DB::table('hotels_trips')->where('trip_id', '=', $trip_id)->get();
        
        foreach ($hotels as $hotel)
        {
            $aHotels[] = DB::table('hotels')->where('hotel_id', '=', $hotel->hotel_id)->first();
        }
        
        if(isset($aHotels)){
            return $aHotels;
        }
        else{
            return null;
        }

    }

    public function UpdateHotelInformation(array $hotelContent) {
        return DB::table("hotels")->select("hotel_id", "hotel_information")->where(["hotel_id" =>$hotelContent["ID"]])->update(["hotel_information"=>$hotelContent["content"]]);
    }

    public function GetHotelById($hotel_id) {
        return DB::table("hotels")->where("hotel_id","=",$hotel_id)->get();
    }

}
