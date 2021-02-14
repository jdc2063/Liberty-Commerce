<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Basket;
use App\Models\Product;

class UpdateController extends Controller
{    
    public function change(Request $request)
    {
        $id = $request->input('id');
        $choose = $request->input('choose');

        $product = new Product;
        $product = $product->find($id);
        $stock = $product->stock;
        $new_stock = $stock - $choose;
        if ($new_stock < 0) {
            $facture = "refused";
           
        } else {
            $facture = "accepted";
        }
        return response()->json([
            'facture' => $facture,
            'stock' => $stock,
            'new' => $new_stock
        ]);
    }
}
