<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserSell extends Model
{
    protected $fillable=['title','description','post_by'];

    public function user(){
        return $this->belongsTo(User::class,'post_by','id');
    }

    public function detail(){
        return $this->hasMany(UserSellDetail::class);
    }


}
