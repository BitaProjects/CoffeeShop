<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use DB;
use App\Product;
class ordersCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $array = [];
        foreach ($this->collection as $result) {
        $mainorder = DB::table('order_product')->where('order_id',$result->id)->first();
        $product = Product::where('id',$mainorder->product_id)->with('options')->first();
        $price = $product->price * $mainorder->count;
            $data = [
               'order_name' =>$product->name,
               'order_status'=>$result->order_status,
               'order_price'=>$price,
               'consume_location'=>$result->consume_location,
               'options'=>$mainorder->options,
               'count'=>$mainorder->count,
               'order_date'=>$result->created_at
            ];
            array_push($array,$data);
        }
        return $array;
    }
}
