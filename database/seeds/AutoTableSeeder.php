<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AutoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 5; $i++)
        {
            DB::table('autos')->insert([
            'auto_name' => Str::random(10),
            'size' => 4
        ]);
        }
    }
}
