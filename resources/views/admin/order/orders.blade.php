@extends('layouts.app')
@section('content')
    @include('components.sidebar');
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">

                <div class="col-md-12 ">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h4>orders List</h4>
                            <hr>
                        </div>
                        <div class="box-body">
                            <table class="table table-hovered">
                                <thead>
                                <tr style="background-color: salmon">
                                    <th class="text-center">id</th>
                                    <th class="text-center">userName</th>
                                    <th class="text-center">productName</th>
                                    <th class="text-center">options</th>
                                    <th class="text-center">count</th>
                                    <th class="text-center">consumeLocation</th>
                                    <th class="text-center">orderPrice</th>
                                    <th class="text-center">status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <?php $mainOrder = \DB::table('order_product')->where('order_id',$order->id)->first();
                                    $product = App\Product::where('id',$mainOrder->product_id)->with('options')->first();
                                    $price = $product->price * $mainOrder->count;
                                    $user = \Auth::user();?>
                                    <tr>
                                        <td class="text-center"><a href={{url('/panel/order/edit',$order->id)}}> {{$order->id}}</a></td>
                                        <td class="text-center">{{$user->name}}</td>
                                        <td class="text-center">{{$product->name}}</td>
                                        <td class="text-center">{{$mainOrder->options}}</td>
                                        <td class="text-center">{{$mainOrder->count}}</td>
                                        <td class="text-center">{{$order->consume_location}}</td>
                                        <td class="text-center">{{$price}}</td>
                                        <td class="text-center">{{$order->order_status}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
