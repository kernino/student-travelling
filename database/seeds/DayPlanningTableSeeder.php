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
            'date' => '2019-05-21 00:00:00',
            'end_location' => "San Francisco",
            'highlight' => Str::random(10),
            'description' => Str::random(50)
        ]);
        
        DB::table('days_plannings')->insert([
            'name' => Str::random(10),
            'date' => '2019-05-22 00:00:00',
            'end_location' => "San Francisco",
            'highlight' => Str::random(10),
            'description' => Str::random(50)
        ]);
        
        DB::table('days_plannings')->insert([
            'name' => Str::random(10),
            'date' => '2019-05-23 00:00:00',
            'end_location' => "San Francisco",
            'highlight' => Str::random(10),
            'description' => Str::random(50)
        ]);
        
        DB::table('days_plannings')->insert([
            'name' => Str::random(10),
            'date' => '2019-05-24 00:00:00',
            'end_location' => "San Francisco",
            'highlight' => Str::random(10),
            'description' => Str::random(50)
        ]);
        
        DB::table('days_plannings')->insert([
            'name' => Str::random(10),
            'date' => '2019-05-25 00:00:00',
            'end_location' => "San Francisco",
            'highlight' => Str::random(10),
            'description' => Str::random(50)
        ]);
        
        DB::table('days_plannings')->insert([
            'name' => Str::random(10),
            'date' => '2019-05-26 00:00:00',
            'end_location' => "San Francisco",
            'highlight' => Str::random(10),
            'description' => Str::random(50)
        ]);
                
        DB::table('days_plannings')->insert([
            'name' => Str::random(10),
            'date' => '2019-05-27 00:00:00',
            'end_location' => "Las Vegas",
            'highlight' => Str::random(10),
            'description' => Str::random(50)
        ]);
                        
        DB::table('days_plannings')->insert([
            'name' => Str::random(10),
            'date' => '2019-05-28 00:00:00',
            'end_location' => "Las Vegas",
            'highlight' => Str::random(10),
            'description' => Str::random(50)
        ]);
                                
        DB::table('days_plannings')->insert([
            'name' => Str::random(10),
            'date' => '2019-05-29 00:00:00',
            'end_location' => "Los Angeles",
            'highlight' => Str::random(10),
            'description' => Str::random(50)
        ]);
                                        
        DB::table('days_plannings')->insert([
            'name' => Str::random(10),
            'date' => '2019-05-30 00:00:00',
            'end_location' => "Los Angeles",
            'highlight' => Str::random(10),
            'description' => Str::random(50)
        ]);
                                                
        DB::table('days_plannings')->insert([
            'name' => Str::random(10),
            'date' => '2019-05-31 00:00:00',
            'end_location' => "Los Angeles",
            'highlight' => Str::random(10),
            'description' => Str::random(50)
        ]);
        
        $days_plannings = DB::table('days_plannings')->get();
           
            foreach($days_plannings as $day_planning)
            {
                DB::table('day_plannings_trips')->insert([
                    "trip_id" => 1,
                    "day_planning_id" => $day_planning->day_planning_id
                ]);        
            }
        
    }
}
