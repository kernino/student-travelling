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
        DB::table('hotels')->insert([
            'email' => Str::random(10).'@gmail.com',
            'hotel_name' => Str::random(5),
            'address' => Str::random(15),
            'phone' => Str::random(10),
            'hotel_information' => Str::random(100)
        ]);
        
        DB::table('hotels')->insert([
            'email' => Str::random(10).'@gmail.com',
            'hotel_name' => Str::random(5),
            'address' => Str::random(15),
            'phone' => Str::random(10),
            'hotel_information' => Str::random(100)
        ]);
                
        DB::table('hotels')->insert([
            'email' => Str::random(10).'@gmail.com',
            'hotel_name' => Str::random(5),
            'address' => Str::random(15),
            'phone' => Str::random(10),
            'hotel_information' => Str::random(100)
        ]);
        
        DB::table('hotels')->insert([
            'email' => Str::random(10).'@gmail.com',
            'hotel_name' => Str::random(5),
            'address' => Str::random(15),
            'phone' => Str::random(10),
            'hotel_information' => Str::random(100)
        ]);
    }
}
