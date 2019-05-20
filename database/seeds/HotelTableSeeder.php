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
            'hotel_information' => Str::random(100),
            'photo_file_path' => Str::random(10)
        ]);
        
        DB::table('hotels')->insert([
            'email' => Str::random(10).'@gmail.com',
            'hotel_name' => Str::random(5),
            'address' => Str::random(15),
            'phone' => Str::random(10),
            'hotel_information' => Str::random(100),
            'photo_file_path' => Str::random(10)
        ]);
                
        DB::table('hotels')->insert([
            'email' => Str::random(10).'@gmail.com',
            'hotel_name' => Str::random(5),
            'address' => Str::random(15),
            'phone' => Str::random(10),
            'hotel_information' => Str::random(100),
            'photo_file_path' => Str::random(10)
        ]);
        
        DB::table('hotels')->insert([
            'email' => Str::random(10).'@gmail.com',
            'hotel_name' => Str::random(5),
            'address' => Str::random(15),
            'phone' => Str::random(10),
            'hotel_information' => Str::random(100),
            'photo_file_path' => Str::random(10)
        ]);
        
        $travellers = DB::table('travellers')->get();
        
       
            DB::table('travellers_rooms')->insert([
                'room_id' => 1,
                'traveller_id' => $travellers[0]->traveller_id
            ]);
            
            DB::table('travellers_rooms')->insert([
                'room_id' => 1,
                'traveller_id' => $travellers[5]->traveller_id
            ]);
            
            DB::table('travellers_rooms')->insert([
                'room_id' => 2,
                'traveller_id' => $travellers[3]->traveller_id
            ]);
            
            DB::table('travellers_rooms')->insert([
                'room_id' => 2,
                'traveller_id' => $travellers[2]->traveller_id
            ]);
            
            DB::table('travellers_rooms')->insert([
                'room_id' => 2,
                'traveller_id' => $travellers[4]->traveller_id
            ]);
                        
            DB::table('travellers_rooms')->insert([
                'room_id' => 3,
                'traveller_id' => $travellers[6]->traveller_id
            ]);
                                    
            DB::table('travellers_rooms')->insert([
                'room_id' => 3,
                'traveller_id' => $travellers[7]->traveller_id
            ]);
            
            DB::table('travellers_rooms')->insert([
                'room_id' => 3,
                'traveller_id' => $travellers[8]->traveller_id
            ]);
            
            DB::table('travellers_rooms')->insert([
                'room_id' => 3,
                'traveller_id' => $travellers[9]->traveller_id
            ]);
            
            DB::table('travellers_rooms')->insert([
                'room_id' => 4,
                'traveller_id' => $travellers[1]->traveller_id
            ]);
    }
}
