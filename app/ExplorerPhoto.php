<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExplorerPhoto extends Model
{
    protected $fillable = [
        'photo', 'is_thumb'
    ];

    public function explorer()
    {
        return $this->belongsTo(Explorer::class);
    }
}
