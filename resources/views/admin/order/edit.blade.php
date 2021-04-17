@extends('layouts.app')
@section('content')
    @include('components.sidebar')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="col col-ms-12">
                    <div class="box box-primary formBorders">
                        <div class="box-header" >
                            <h4 style="background-color: salmon;padding: 20px">order Edit Status</h4>
                        </div>
                        <form action="{{url('/panel/order/update',$order->id)}}" method="post" style="padding: 30px" >
                            {{csrf_field()}}
                            <div class="form-group">
                                <label> orderId </label>
                                <input class="form-control" name="id" value="{{$order->id}}" readonly>
                            </div>

                            <div class="form-group">
                                <label>status</label>
                                <select class="form-control" name="order_status" id="order_status">
                                        <option value="{{'waiting'}}" @if($order->order_status=='waiting') selected="selected" @endif >{{'waiting'}}</option>
                                        <option value="{{'prepared'}}" @if($order->order_status=='prepared') selected="selected" @endif >{{'prepared'}}</option>
                                        <option value="{{'delivered'}}" @if($order->order_status=='delivered')) selected="selected" @endif >{{'delivered'}}</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success">submit</button>
                        </form>
                        <div class="box-body">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection