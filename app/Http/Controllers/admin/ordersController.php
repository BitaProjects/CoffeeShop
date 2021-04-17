<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\orderStatusMail;
use Illuminate\Http\Request;
use App\Order;
use Mail;
use App\User;
use App\Jobs\SendEmailJob;

class ordersController extends Controller
{
    public function index()
    {
        $orders = Order::orderby('id','DESC')->get();
        return view('admin.order.orders',compact('orders'));
    }

    public function edit($orderId)
    {
        $order = Order::where('id',$orderId)->first();
        return view('admin.order.edit',compact('order'));

    }

    public function update(Request $request)
    {
         Order::where('id',$request->id)->update([
            'order_status'=>$request->order_status,
        ]);
        $order = Order::where('id',$request->id)->first();
        $user = User::where('id',$order->user_id)->first();
        $details = [
            'user_name'=>$user->name,
            'order_status' => $order->order_status
        ];
        $userMail = $user->email;
        dispatch(new SendEmailJob($userMail,$details));
        $orders = Order::orderby('id','DESC')->get();
        return view('admin.order.orders',compact('orders'));
    }
}
