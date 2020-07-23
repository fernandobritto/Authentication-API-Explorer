<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Explorer extends Model
{

    protected $fillable = [
        'user_id', 'title', 'description', 'content',
        'price', 'bathrooms', 'bedrooms', 'property_area',
        'total_property_area', 'slug'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}