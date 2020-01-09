<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = [
		'name', 'description', 'price', 'quantity', 'pictures', 'category_id', 'user_id',
	];

    public function user()
    {
        return $this->belongsTo(User::class);
	}

    public function category()
    {
        return $this->belongsTo(Category::class);
	}
}
