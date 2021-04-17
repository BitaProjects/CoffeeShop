<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
        'option','choices'
    ];
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
