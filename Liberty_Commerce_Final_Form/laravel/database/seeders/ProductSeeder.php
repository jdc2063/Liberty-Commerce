<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            'title' => "masque squelette",
            'description'=> "Car un jour, tôt ou tard, on est que des os",
            'price' => 2,
            'stock' => 38,
            'basket_id' => 1,
        ]);
        DB::table('product')->insert([
            'title' => "masque vampire",
            'description'=> "Pour Croquer la vie à pleine dent",
            'price' => 10,
            'stock' => 70,
            'basket_id' => 1,
        ]);
        DB::table('product')->insert([
            'title' => "marque rigolo",
            'description'=> "Car il faut savoir rire à tout instant",
            'price' => 16,
            'stock' => 10,
        ]);
    }
}
