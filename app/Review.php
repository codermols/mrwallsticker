<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
		'title',
		'review',
		'rating'
    ]; 

    public function reviewer()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }
}
