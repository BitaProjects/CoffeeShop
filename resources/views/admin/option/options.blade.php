@extends('layouts.app')
@section('content')
    @include('components.sidebar');
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">

                <div class="col-md-12 ">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h4>options List</h4>
                            <hr>
                            <h5>do you want to create a new option?</h5>
                            <a type="button" class="btn btn-warning" href="{{url('/panel/option/create')}}" style="margin-bottom: 10px">create</a>
                        </div>
                        <div class="box-body">
                            <table class="table table-hovered">
                                <thead>
                                <tr style="background-color: salmon">
                                    <th class="text-center">id</th>
                                    <th class="text-center">option</th>
                                    <th class="text-center">choices</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($options as $option)
                                    <tr>
                                        <td class="text-center"><a href={{url('/panel/option/edit',$option->id)}}> {{$option->id}}</a></td>
                                        <td class="text-center">{{$option->option}}</td>
                                        <td class="text-center">{{$option->choices}}</td>
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
