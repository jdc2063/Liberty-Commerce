<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Product_ListeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_list')->insert([
            "user_id" => 1,
        ]);
        DB::table('product_list')->insert([
            "user_id" => 2,
        ]);
        DB::table('product_list')->insert([
            "user_id" => 3,
        ]);
    }
}
