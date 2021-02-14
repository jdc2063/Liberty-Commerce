<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Facture;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

class FactureController extends Controller
{
    public function create(Request $request): JsonResponse
    {
        $id = $request->input('id');
        $price_f = $request->input('price_t');
        $choose = $request->input('choose');
        $facture_number = $request->input('facture_number');
        $user = $request->user();
        $user = $user->id;

        $product = new Product;
        $product = $product->find($id);
        $stock = $product->stock;
        $new_stock = $stock - $choose;
        
        $title = $product->title;
        $price = $product->price;
        $product->stock = $new_stock;
        $price_t = $product->price * $choose;
        $product->save();

        $facture = new Facture();
        $facture->title = $title;
        $facture->choose = $choose;
        $facture->price = $price;
        $facture->price_t = $price_t;
        $facture->price_f = $price_f;
        $facture->user_id = $user;
        $facture->basket_id = $user;
        $facture->number_facture = $facture_number;
        $facture->save();

        return response()->json([
            'facture' => $facture
        ]);
    }

    public function show(Request $request)
    {
        $facture = new Facture;
        $facture = $facture->orderby('id', 'desc')->first();
        $facture_number = $facture->number_facture;
        $facture = new Facture;
        $facture = Facture::where('number_facture', 'like', $facture_number)->get();
        return view('facture')->withFacture($facture)->withnumber($facture_number);
    }
}
