<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "product";
    
    public function baskets()
    {
        return $this->belongsTo('App\Models\Basket', 'basket_id');
    }
    
    public function product_lists()
    {
        return $this->belongsTo('App\Models\Product_list', 'product_list_id');
    }
    
    public function factures()
    {
        return $this->belongsTo('App\Models\Facture', 'facture_id');
    }
}
