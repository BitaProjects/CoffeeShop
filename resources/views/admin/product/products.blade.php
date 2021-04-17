@extends('layouts.app')
@section('content')
    @include('components.sidebar');
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">

                <div class="col-md-12 ">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h4>products List</h4>
                            <hr>
                            <h5>do you want to create a new product?</h5>
                            <a type="button" class="btn btn-warning" href="{{url('/panel/product/create')}}" style="margin-bottom: 10px">create</a>
                        </div>
                        <div class="box-body">
                            <table class="table table-hovered">
                                <thead>
                                <tr style="background-color: salmon">
                                    <th class="text-center">id</th>
                                    <th class="text-center">name</th>
                                    <th class="text-center">price</th>
                                    <th class="text-center">options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <?php
                                    $options = App\Product::find($product->id)->checkOptions($product->options);
                                    ?>
                                    <tr>
                                        <td class="text-center"><a href={{url('/panel/product/edit',$product->id)}}> {{$product->id}}</a></td>
                                        <td class="text-center">{{$product->name}}</td>
                                        <td class="text-center">{{$product->price}}</td>
                                        <td class="text-center">{{$options}}</td>
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
