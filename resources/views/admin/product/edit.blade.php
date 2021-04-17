@extends('layouts.app')
@section('content')
    @include('components.sidebar')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="col col-ms-12">
                    <div class="box box-primary formBorders">
                        <div class="box-header" >
                            <h4 style="background-color: salmon;padding: 20px">Products create page</h4>
                        </div>
                        <form action="{{url('/panel/product/update',$product->id)}}" method="post" style="padding: 30px"  enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label> name </label>
                                <input class="form-control" name="name" value="{{$product->name}}">
                            </div>

                            <div class="form-group">
                                <label>price</label>
                                <input type="text" class="form-control" name="price" id="price" value="{{$product->price}}">
                            </div>

                            <div class="form-group">
                                <label>options</label>
                                <select class="form-control" multiple="multiple" name="options[]" id="options">
                                    <?php  $productOptions = App\Product::find($product->id)->optionArray($product->options);?>
                                    @foreach($options as $option)
                                        <option value="{{$option->id}}" @if(in_array($option->option,$productOptions)) selected="selected" @endif >{{$option->option}}</option>
                                    @endforeach
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
    <script type="application/javascript">
        $(document).ready(function () {
            $('#options').select2({
                placeholder: 'choose product options',
                allowClear: true
            });

        })

    </script>
@endsection