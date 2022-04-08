<?php

namespace Database\Seeders;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
            DB::table('users')->insert([
                    'name'=> "Santiago",
                    'surname'=>"El Tito Santi",
                    'email'=>"rubitozas@gmail.com",
                    'fecha_nacimiento'=>"2001-08-20",
                    'password'=>Hash::make("12345678"),
                    'rol_id'=>"2",
            ]);

            DB::table('users')->insert([
                'name'=> "profe",
                'surname'=>"adminprofe",
                'email'=>"admin@gmail.com",
                'fecha_nacimiento'=>"2001-08-20",
                'password'=>Hash::make("abc123.."),
                'rol_id'=>"2",
        ]);

          
            
    
    }
}
