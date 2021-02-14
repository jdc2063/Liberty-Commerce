<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Basket;
use App\Models\Photo;
use Illuminate\Support\Facades\DB;

class CatalogueController extends Controller
{
    public function see(Request $request)
    {
        $user = $request->user();
        $save = new Photo();

        $save = $save::all();

        $basket = new Basket();

        $basket = $basket->find($user->id);
        $basket = $basket->products;
        $products = new Product();

        $all_product = $products::all();


        return view('catalogue')->withProducts($all_product)->withPhoto($save);
        
    }

    public function select(Request $request)
    {
        $user = $request->user();
        $save = new Photo();

        $save = $save::all();

        $products = new Product();
        $test = $request->post('id');
        $product_select = $products->find($test);

        return view('detail')->withProducts($product_select)->withUser($user)->withPhoto($save);

    }
}
