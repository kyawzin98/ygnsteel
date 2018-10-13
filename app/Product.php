<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'productname', 'weight','user_by'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_by','id');
    }
}
