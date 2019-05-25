<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TripTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('trips')->insert([
            'name' => "Amerika 2019",
            'is_active' => true,
            'year' => "2019",
            'price' => 2000,
            'contact_mail' => Str::random(10).'@gmail.com',
            'start_date' => "21 mei 2019",
            'end_date' => "1 juni 2019",
            'destination' => "Verenigde Staten",
            'travel_code' => "12345",
            'transportation_info' => Str::random(100)
        ]);
         
        DB::table('trips')->insert([
            'name' => "Duitsland 2019",
            'is_active' => true,
            'year' => "2019",
            'price' => 1,
            'contact_mail' => Str::random(10).'@gmail.com',
            'start_date' => "21 mei 2019",
            'end_date' => "1 juni 2019",
            'destination' => "Duitsland",
            'travel_code' => "678910",
            'transportation_info' => Str::random(100)
        ]);
        
    }
}
