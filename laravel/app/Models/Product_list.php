<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_list extends Model
{
    use HasFactory;
    protected $table = "product_list";

    public function users()
    {
        return $this->belongsTo('App\Models\User', "user_id");
    }
    
    public function products()
    {
        return $this->hasOne('App\Models\Product');
    }
    
}
