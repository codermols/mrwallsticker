<?php

namespace App;

use App\Order;
use App\Photo;
use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use SoftDeletes;
	
    protected $casts = ['price'];
    protected $dates = ['deleted_at'];
	protected $fillable = ['name', 'sku', 'price', 'description', 'is_customizable', 'category_id', 'photo_id'];



    public function scopeSlug($query, $name)
    {
        $name = str_replace('-', ' ', $name);

        return $query->where(compact('name'));
    }
	
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function orders()
    {
    	return $this->hasMany(Order::class);
    }

    public function photos()
    {
        return $this->hasMany('App\Photo', 'product_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}


