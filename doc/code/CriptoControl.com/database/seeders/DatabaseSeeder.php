<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\userSeeder;
use Database\Seeders\categoriaSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
    
            userSeeder::class,
            categoriaSeeder::class,

        ]);
    }
}
