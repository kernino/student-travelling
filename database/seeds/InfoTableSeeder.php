<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class InfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 5; $i++){
            DB::table('infos')->insert([
                'name' => Str::random(10),
                'description' => Str::random(50)
            ]);
        }
            
    }
}
