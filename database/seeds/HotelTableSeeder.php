<?php

use Illuminate\Database\Seeder;

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
            'hotel_id' => 0,
            'email' => Str::random(10).'@gmail.com',
            'hotel_namee' => Str::random(5),
            'address' => Str::random(15),
            'phone' => Str::random(10),
            'hotel_information' => Str::random(100)
        ]);
    }
}
