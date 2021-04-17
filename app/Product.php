<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price'
    ];
    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }
    public function options()
    {
        return $this->belongsToMany('App\Option');
    }
    public function checkOptions($options)
    {
        $optionarray = [];
        foreach ($options as $option){
            array_push($optionarray,$option->option);
        }
        $productOptions=json_encode($optionarray);
        return $productOptions;
    }
    public function OptionArray($options)
    {
        $optionArray = [];
        foreach ($options as $option){
            array_push($optionArray,$option->option);
        }
        return $optionArray;
    }
}
