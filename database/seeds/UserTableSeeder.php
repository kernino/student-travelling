<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++){
            DB::table('create_users_table')->insert([
                'user_name' => Str::random(10),
                'password' => Str::random(10),
                'role' => Str::random(10)
            ]);
        }
      
    }
}
