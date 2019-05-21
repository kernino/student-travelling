<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TravellerRoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('travellers_rooms')->insert([
            'room_id' => 1
        ]);
        
        DB::table('travellers_rooms')->insert([
            'room_id' => 2
        ]);
        
        DB::table('travellers_rooms')->insert([
            'room_id' => 3
        ]);
        
        DB::table('travellers_rooms')->insert([
            'room_id' => 4
        ]);
        
        DB::table('travellers_rooms')->insert([
            'room_id' => 5
        ]);
    }
}
