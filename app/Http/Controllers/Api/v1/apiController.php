<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductsCollection;
use App\Http\Resources\ordersCollection;
use App\User;
use JWTFactory;
use JWTAuth;
use Validator;
use Response;
use Auth;
use App\Order;
use DB;


class apiController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $credentials = $request->only('email', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(compact('token'));
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required',
            'password'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $user=User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);
        $token = JWTAuth::fromUser($user);

        return Response::json(compact('token'));
    }
    public function viewMenu()
    {
        $products = Product::with('options')->paginate(10);
        return  new ProductsCollection($products);
    }
    public function order(Request $request)
    {
        $user = Auth::user();
        $order = Order::create([
            'user_id'=>$user->id,
            'order_status'=>'waiting',
            'consume_location'=>$request->consume_location,

        ]);
        $productOrder = DB::table('order_product')->insert([
            'product_id'=>$request->product_id,
            'order_id'=>$order->id,
            'options'=>$request->options,
            'count'=>$request->count
        ]);
        return response()->json(['status:success']);
    }
    public function changeOrder(Request $request)
    {
        $user = Auth::user();
        $order = Order::where('id',$request->order_id)->where('user_id',$user->id)->first();
        if($order->order_status != 'waiting'){
            return response()->json(['you cant changes your order any more']);
        }else{
             Order::where('id',$request->order_id)->update([
                'user_id'=>$user->id,
                'order_status'=>'waiting',
                'consume_location'=>$request->consume_location,

            ]);
            $productOrder = DB::table('order_product')->where('order_id',$request->order_id)->update([
                'product_id'=>$request->product_id,
                'order_id'=>$order->id,
                'options'=>$request->options,
                'count'=>$request->count
            ]);
            return response()->json(['you change your order successfully']);
        }
    }
    public function cancelOrder($orderID)
    {
        $user = Auth::user();
        $order = Order::where('id',$orderID)->where('user_id',$user->id)->first();
        if($order->order_status != 'waiting'){
            return response()->json(['you cant cancel your order any more']);
        }else {
            $order->delete();
            return response()->json(['you canceled your order successfully']);
        }
    }

    public function viewOrders()
    {
        $user = Auth::user();
        $orders = Order::where('user_id',$user->id)->orderby('id','DESC')->paginate(10);
        return  new OrdersCollection($orders);

    }
}
