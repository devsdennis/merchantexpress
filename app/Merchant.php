<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Merchant extends Model
{
    protected $dates = ['deleted_at'];

	protected $fillable=['title','description','account','user_id','location','pmethod','telephone','email'];

    //A medic has many treatment records
	public function orders()
	{
		return $this->hasMany('App\Order');
	}
}
