<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Basket;
use Illuminate\Support\Facades\DB;
Use App\Models\Photo;

class AdminController extends Controller
{
    public function admin(Request $request)
    {
        $user = $request->user();
        if ($user->admin == 0) {
            $user->admin = 1;
        } else {
            $user->admin = 0;
        }
        return back()->withno($user);
    }
    
    
    public function add()
    {
        return view('add');//
    }
    
    public function create(Request $request) {
        
        $validatedData = $request->validate(['image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        
        ]);
    
        $name = $request->file('image')->getClientOriginalName();

        $path = $request->file('image')->store('public/images');


        $save = new Photo;

        $save->name = $name;
        $save->path = $path;

        $save->save();

        $product = new Product();
        $product->title = $request->post('title');
        $product->description = $request->post('description');
        $product->price = $request->post('price');
        $product->stock = $request->post('stock');

        $product->save();

        $validatedData = $request->validate(['image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        
        ]);
    
        $name = $request->file('image')->getClientOriginalName();

        $path = $request->file('image')->store('public/images');


        $save = new Photo;

        $save->name = $name;
        $save->path = $path;

        $save->save();
                
        return redirect('/admin')->withstape($product);
    }

    public function change(Request $request) {
        $user = $request->user();
        $product = new Product();
        $test = $request->post('id');
        $product = $product->find($test);

        $transition = $request->post('stock');

        $transition = (int)$transition;
        $product->stock = $transition;
   
        $product->save();
        $products = new Product();
        $me = $request->user();
        $test = $request->post('id');
        $product_select = $products->find($test);
        $save = new Photo();

        $save = $save::all();

        return view('detail')->withProducts($product_select)->withUser($user)->withPhoto($save);
    }
}
