<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

class BasketController extends Controller
{
    public function see(Request $request) 
    {
        $user = $request->user();
        $product_list = new Product();
        $product_list = $product_list::all();
        $basket = new Basket();
        $basket = $basket->find($user->id);
        $basket = $basket->products;
        return view('basket')->withPanier($basket)->withtest(0)->withfinal(0)->withcompteur(0)->withList($product_list);
    }

    public function add(Request $request)
    {
        $user = $request->user();
        $user_id = $user->id;
        $test = $request->post('q');

        $product = new Product();
        $product_choose = $product->find($test);
        $product_choose->basket_id = $user_id;
        $product_choose->save();
        
        return redirect('/basket');
    }

    public function select(Request $request): JsonResponse
    {
        $q = $request->input('q');
        $product = new Product;
        $product = Product::where('id', 'like', $q)->get();
        return response()->json([
            'panier' => $product
        ]);
    }
}
