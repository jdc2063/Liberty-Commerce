<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BasketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('basket')->insert([
            'user_id' => 1,
            'facture_id' => 1,
        ]);
        DB::table('basket')->insert([
            'user_id' => 1,
            'facture_id' => 2,
        ]);
        DB::table('basket')->insert([
            'user_id' => 1,
            'facture_id' => 3,
        ]);
        DB::table('basket')->insert([
            'user_id' => 3,
            'facture_id' => 3,
        ]);
        
    }
}
