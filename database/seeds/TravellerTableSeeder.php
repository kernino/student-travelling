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
                'phone' => Str::random(10)
            ]);
        }

    }
}
