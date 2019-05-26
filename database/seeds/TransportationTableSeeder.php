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
        $drivers = 0;
        $passengers = 0;
        foreach ($travellers as $traveller)
        {
            if (isset($traveller->major_name))
            {
                $passengers++;
                if ($passengers < 4)
                {
                    DB::table('travellers_autos')->insert([
                        'auto_trip_id' => $autosPerTrip[0]->auto_trip_id,
                        'traveller_id' => $traveller->traveller_id,
                        'role' => 'passenger'
                    ]);
                }
                else
                {
                    DB::table('travellers_autos')->insert([
                        'auto_trip_id' => $autosPerTrip[1]->auto_trip_id,
                        'traveller_id' => $traveller->traveller_id,
                        'role' => 'passenger'
                    ]);
                }
            }
            else
            {
                $drivers++;
                if ($drivers < 3)
                {
                    DB::table('travellers_autos')->insert([
                        'auto_trip_id' => $autosPerTrip[0]->auto_trip_id,
                        'traveller_id' => $traveller->traveller_id,
                        'role' => 'driver'
                    ]);  
                }
                else
                {
                    DB::table('travellers_autos')->insert([
                        'auto_trip_id' => $autosPerTrip[1]->auto_trip_id,
                        'traveller_id' => $traveller->traveller_id,
                        'role' => 'driver'
                    ]);                        
                }
            }                
        }
    }
}
