<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TravellerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++)
        {
            DB::table('travellers')->insert([
                'first_name' => Str::Random(5),
                'last_name' => Str::Random(10),
                'email' => Str::random(10).'@gmail.com',
                'phone' => Str::random(10),
                'country' => Str::random(10),
                'study_name' => Str::random(10),
                'address' => Str::random(10),
                'gender' => Str::random(10),
                'emergency_phone_1' => Str::random(10),
                'emergency_phone_2' => Str::random(10),
                'nationality' => Str::random(10),
                'birthdate' => Str::random(10),
                'birthplace' => Str::random(10)
            ]);
        }

    }
}
