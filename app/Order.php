<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $dates = ['deleted_at'];

	protected $fillable=['status','tranaction','amount','code','merchant_id','bundle_id','user_id','location',
	'location_flag','merchant_amount','company_amount','rate','used_flag'];

    // A treatment record belons to a medic
	public function merchant()
	{
		return $this->belongsTo('App\Merchant');
	}

      // A treatment record belons to a user
	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
