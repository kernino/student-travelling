<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HotelTripTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hotels_trips')->insert([
            'hotel_end_date' => '2019-05-06',
            'hotel_end_date' => '2019-05-08'
        ]);
        
        DB::table('hotels_trips')->insert([
            'hotel_end_date' => '2019-05-08',
            'hotel_end_date' => '2019-05-10'
        ]);
        
        DB::table('hotels_trips')->insert([
            'hotel_end_date' => '2019-05-10',
            'hotel_end_date' => '2019-05-11'
        ]);
        
        DB::table('hotels_trips')->insert([
            'hotel_end_date' => '2019-05-11',
            'hotel_end_date' => '2019-05-12'
        ]);
    }
}
