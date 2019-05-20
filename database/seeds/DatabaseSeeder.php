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
    }
}
