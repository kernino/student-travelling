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
            DB::table('infos')->insert([
                'name' => "AlgemeneInfo",
                'content' => Str::random(50)
            ]);           
    }
}
