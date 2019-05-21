<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RoomHotelTripTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms_hotels_trips')->insert([
            'room_number' => 1,
            'size' => 5
        ]);
        
        DB::table('rooms_hotels_trips')->insert([
            'room_number' => 2,
            'size' => 5
        ]);
        
        DB::table('rooms_hotels_trips')->insert([
            'room_number' => 3,
            'size' => 5
        ]);
        
        DB::table('rooms_hotels_trips')->insert([
            'room_number' => 4,
            'size' => 5
        ]);
        
    }
}
