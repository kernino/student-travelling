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
                for ($i = 0; $i < 4; $i++)
        {
            DB::table('autos')->insert([
                'size' => 12
            ]);            
        }
    }
}
