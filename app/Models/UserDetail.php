<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable=['address1','address2','township','phone','nrc_no','business_type','working_bank','bank_account_no','user_id'];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
