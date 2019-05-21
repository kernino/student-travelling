<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HotelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $travellers = DB::table('travellers')->get();
        $trips = DB::table('trips')->get();
        
        for ($i = 0; $i < 4; $i++)
        {
            DB::table('hotels')->insert([
                'email' => Str::random(10).'@gmail.com',
                'hotel_name' => Str::random(5),
                'address' => Str::random(15),
                'phone' => Str::random(10),
                'hotel_information' => Str::random(100),
                'photo_file_path' => Str::random(10)
            ]); 
        }

        $hotels = DB::table('hotels')->get();
        
        for ($i = 0; $i < $hotels->count(); $i++)
        {
            DB::table('hotels_trips')->insert([
                'trip_id' => $trips[0]->trip_id,
                'hotel_id' => $hotels[$i]->hotel_id,
                'hotel_start_date' => Carbon\Carbon::now(),
                'hotel_end_date' => Carbon\Carbon::now(),
            ]);
        }
        
        $hotelsPerTrip = DB::table('hotels_trips')->get();
        
        for ($i = 0; $i < $hotelsPerTrip->count(); $i++)
        {
            DB::table('rooms_hotels_trips')->insert([
                'hotel_trip_id' => 1,
                'room_number' => $i+1,
                'size' => 4
            ]);
        }
        
        $roomsPerHotelPerTrip = DB::table('rooms_hotels_trips')->get();
         
        DB::table('travellers_rooms')->insert([
            'room_hotel_trip_id' => $roomsPerHotelPerTrip[0]->room_hotel_trip_id,
            'traveller_id' => $travellers[0]->traveller_id
        ]);

        DB::table('travellers_rooms')->insert([
            'room_hotel_trip_id' => $roomsPerHotelPerTrip[0]->room_hotel_trip_id,
            'traveller_id' => $travellers[5]->traveller_id
        ]);

        DB::table('travellers_rooms')->insert([
            'room_hotel_trip_id' => $roomsPerHotelPerTrip[0]->room_hotel_trip_id,
            'traveller_id' => $travellers[3]->traveller_id
        ]);

        DB::table('travellers_rooms')->insert([
            'room_hotel_trip_id' => $roomsPerHotelPerTrip[0]->room_hotel_trip_id,
            'traveller_id' => $travellers[2]->traveller_id
        ]);

        DB::table('travellers_rooms')->insert([
            'room_hotel_trip_id' => $roomsPerHotelPerTrip[1]->room_hotel_trip_id,
            'traveller_id' => $travellers[4]->traveller_id
        ]);

        DB::table('travellers_rooms')->insert([
            'room_hotel_trip_id' => $roomsPerHotelPerTrip[1]->room_hotel_trip_id,
            'traveller_id' => $travellers[6]->traveller_id
        ]);

        DB::table('travellers_rooms')->insert([
            'room_hotel_trip_id' => $roomsPerHotelPerTrip[1]->room_hotel_trip_id,
            'traveller_id' => $travellers[7]->traveller_id
        ]);

        DB::table('travellers_rooms')->insert([
            'room_hotel_trip_id' => $roomsPerHotelPerTrip[1]->room_hotel_trip_id,
            'traveller_id' => $travellers[8]->traveller_id
        ]);

        DB::table('travellers_rooms')->insert([
            'room_hotel_trip_id' => $roomsPerHotelPerTrip[2]->room_hotel_trip_id,
            'traveller_id' => $travellers[9]->traveller_id
        ]);

        DB::table('travellers_rooms')->insert([
            'room_hotel_trip_id' => $roomsPerHotelPerTrip[2]->room_hotel_trip_id,
            'traveller_id' => $travellers[1]->traveller_id
        ]);

        
    }
}
