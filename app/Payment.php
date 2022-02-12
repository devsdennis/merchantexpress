<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    protected $dates = ['deleted_at'];

	protected $fillable=['verify_flag','reject_flag','user_id','code','cust_id','type'];

    public function user(){
        return $this->belongsTo('App\User');
        }
}
