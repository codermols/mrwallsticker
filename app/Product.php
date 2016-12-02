<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use SoftDeletes;
	
	protected $dates = ['deleted_at'];
	protected $fillable = ['name', 'sku', 'price', 'description', 'is_customizable', 'is_downloadable'];
	
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function orders()
    {
    	return $this->hasMany('App\Order');
    }

    public function photos()
    {
        return $this->hasMany('App\Products');
    }
}


