<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;
    protected $table = "basket";
    
    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
    public function factures()
    {
        return $this->belongsTo('App\Models\User', 'facture_id');
    }
}
