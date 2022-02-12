<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bundle extends Model
{
    protected $dates = ['deleted_at'];

	protected $fillable=['title','description','amount','user_id'];
}
