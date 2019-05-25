<?php

use Illuminate\Database\Seeder;

class TransportationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $travellers = DB::table('travellers')->get();
        
        for ($i = 0; $i < 4; $i++)
        {
            DB::table('autos')->insert([
                'size' => 12
            ]);            
        }
        
        $autos = DB::table('autos')->get();
        
        for ($i = 0; $i < $autos->count(); $i++)
        {
            Db::table('autos_trips')->insert([
                'trip_id' => 1,
                'auto_id' => $autos[$i]->auto_id
            ]);
        }
        
        $autosPerTrip = DB::table('autos_trips')->get();
        
        DB::table('travellers_autos')->insert([
           'auto_trip_id' => $autosPerTrip[0]->auto_trip_id,
           'traveller_id' => $travellers[0]->traveller_id,
           'role' => 'driver'
        ]);

        DB::table('travellers_autos')->insert([
           'auto_trip_id' => $autosPerTrip[0]->auto_trip_id,
           'traveller_id' => $travellers[1]->traveller_id,
           'role' => 'driver'
        ]);

        DB::table('travellers_autos')->insert([
           'auto_trip_id' => $autosPerTrip[0]->auto_trip_id,
           'traveller_id' => $travellers[2]->traveller_id,
           'role' => 'passenger'
        ]);            

        DB::table('travellers_autos')->insert([
           'auto_trip_id' => $autosPerTrip[0]->auto_trip_id,
           'traveller_id' => $travellers[3]->traveller_id,
           'role' => 'passenger'
        ]);

        DB::table('travellers_autos')->insert([
           'auto_trip_id' => $autosPerTrip[0]->auto_trip_id,
           'traveller_id' => $travellers[4]->traveller_id,
           'role' => 'passenger'
        ]);

        DB::table('travellers_autos')->insert([
           'auto_trip_id' => $autosPerTrip[1]->auto_trip_id,
           'traveller_id' => $travellers[5]->traveller_id,
           'role' => 'driver'
        ]);

        DB::table('travellers_autos')->insert([
           'auto_trip_id' => $autosPerTrip[1]->auto_trip_id,
           'traveller_id' => $travellers[6]->traveller_id,
           'role' => 'driver'
        ]);

        DB::table('travellers_autos')->insert([
           'auto_trip_id' => $autosPerTrip[1]->auto_trip_id,
           'traveller_id' => $travellers[7]->traveller_id,
           'role' => 'passenger'
        ]);            

        DB::table('travellers_autos')->insert([
           'auto_trip_id' => $autosPerTrip[1]->auto_trip_id,
           'traveller_id' => $travellers[8]->traveller_id,
           'role' => 'passenger'
        ]);

        DB::table('travellers_autos')->insert([
           'auto_trip_id' => $autosPerTrip[1]->auto_trip_id,
           'traveller_id' => $travellers[9]->traveller_id,
           'role' => 'passenger'
        ]);
    }
}
