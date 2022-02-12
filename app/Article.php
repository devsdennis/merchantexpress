<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    protected $dates = ['deleted_at'];

	protected $fillable=['title','description','user_id'];
}
