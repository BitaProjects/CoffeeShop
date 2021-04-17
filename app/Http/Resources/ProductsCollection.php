<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductsCollection extends ResourceCollection
{
    public function toArray($request)
    {
        $array = [];
        foreach ($this->collection as $result) {
            $arrayoption = array();
            foreach ($result->options as $option){
                $optiondata = [
                    'option'=>$option->option,
                    'choices'=>$option->choices
                ];
                array_push($arrayoption,$optiondata);
            }
             $data = [
                 'id' => $result->id,
                 'name' => $result->name,
                 'price' => $result->price,
                 'options' => $arrayoption
                 ];
         array_push($array , $data);
        }
        return $array;
    }
}
