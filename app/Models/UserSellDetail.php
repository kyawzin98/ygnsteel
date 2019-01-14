<?php

namespace App\Models;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class UserSellDetail extends Model
{
    protected $fillable=['user_sell_id','product_id','price','qty','status'];

    public function sell(){
        return $this->belongsTo(UserSell::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
