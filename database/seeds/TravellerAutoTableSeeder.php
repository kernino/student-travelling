<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TravellerAutoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 5; $i++){
            DB::table('travellers_autos')->insert([
                'role' => Str::random(10)
            ]);
        }         
    }
}
