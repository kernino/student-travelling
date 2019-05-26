<?php

use Illuminate\Database\Seeder;
use database\seeds;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TripTableSeeder::class);
        $this->call(TravellerTableSeeder::class);
        
        $this->call(HotelTableSeeder::class);
        $this->call(TransportationTableSeeder::class);
        $this->call(DayPlanningTableSeeder::class);
        $this->call(InfoTableSeeder::class);
    }
}
