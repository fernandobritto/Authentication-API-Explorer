<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description', 'slug', 'created_at', 'updated_at'];

    public function explorer()
    {
        return $this->belongsToMany(Explorer::class);
    }
}

