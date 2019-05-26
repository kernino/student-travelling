<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DayPlanningTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('days_plannings')->insert([
            'name' => Str::random(10),
            'date' => '2019-05-06 00:00:00',
            'end_location' => Str::random(10),
            'highlight' => Str::random(10),
            'description' => Str::random(50)
        ]);
        
        DB::table('days_plannings')->insert([
            'name' => Str::random(10),
            'date' => '2019-05-07 00:00:00',
            'end_location' => Str::random(10),
            'highlight' => Str::random(10),
            'description' => Str::random(50)
        ]);
        
        DB::table('days_plannings')->insert([
            'name' => Str::random(10),
            'date' => '2019-05-08 00:00:00',
            'end_location' => Str::random(10),
            'highlight' => Str::random(10),
            'description' => Str::random(50)
        ]);
        
        DB::table('days_plannings')->insert([
            'name' => Str::random(10),
            'date' => '2019-05-09 00:00:00',
            'end_location' => Str::random(10),
            'highlight' => Str::random(10),
            'description' => Str::random(50)
        ]);
        
        DB::table('days_plannings')->insert([
            'name' => Str::random(10),
            'date' => '2019-05-10 00:00:00',
            'end_location' => Str::random(10),
            'highlight' => Str::random(10),
            'description' => Str::random(50)
        ]);
    }
}
