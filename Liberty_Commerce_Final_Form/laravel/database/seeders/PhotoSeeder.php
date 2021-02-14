<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('photos')->insert([
            "name" => "image 1",
            "path" => "public/images/masque_beau.jpg",
        ]);
        
        DB::table('photos')->insert([
            "name" => "image 2",
            "path" => "public\images\masque_vampire.png",
        ]);

        DB::table('photos')->insert([
            "name" => "image 3",
            "path" => "public\images\masque_drole.png",
        ]);

    }
}
