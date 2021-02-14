<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
    protected $table = "facture";
    
    public function baskets()
    {
        return $this->hasOne('App\Models\Basket');
    }
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function products()
    {
        return $this->hasOne('App\Models\Product');
    }
}
