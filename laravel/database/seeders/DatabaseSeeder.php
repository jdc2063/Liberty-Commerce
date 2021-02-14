<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            BasketSeeder::class,
            FactureSeeder::class,
            Product_ListeSeeder::class,
            ProductSeeder::class,
            PhotoSeeder::class,
        ]);

    }
}
