<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(TravellerTableSeeder::class);
        $this->call(TripTableSeeder::class);
        $this->call(HotelTableSeeder::class);
        $this->call(AutoTableSeeder::class);
        //$this->call(AutoTripTableSeeder::class);
        //$this->call(UserTableSeeder::class);
        $this->call(DayPlanningTableSeeder::class);
        //$this->call(DayPlanningTripTableSeeder::class);
        //$this->call(HotelTripTableSeeder::class);
        $this->call(InfoTableSeeder::class);
        //$this->call(RoomHotelTripTableSeeder::class);
        //$this->call(TravellerAutoTableSeeder::class);
        //$this->call(TravellerRoomTableSeeder::class);
        //$this->call(TravellerTripTableSeeder::class);
    }
}
