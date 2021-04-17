<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Option;

class productsController extends Controller
{
    public function index()
    {
        $products = Product::with('options')->get();
        return view('admin.product.products',compact('products'));
    }

    public function create()
    {
        $options = Option::all();
        return view('admin.product.create',compact('options'));
    }

    public function edit($productID)
    {
        $product = Product::where('id',$productID)->first();
        $options = Option::all();
        return view('admin.product.edit',compact('product','options'));
    }
    public function update(Request $request , $productID)
    {
        Product::where('id',$productID)->update(
            [
                'name'=>$request->name,
                'price'=>$request->price,
            ]);
        $product = Product::where('id',$productID)->first();

        $product->options()->sync($request->options);
        $products = Product::all();
        return view('admin.product.products',compact('products'));
    }

    public function store(Request $request)
    {
        $product = Product::create(
            [
                'name'=>$request->name,
                'price'=>$request->price,
            ]);
            $product->options()->sync($request->options);
        $products = Product::all();
        return view('admin.product.products',compact('products'));
    }
}
