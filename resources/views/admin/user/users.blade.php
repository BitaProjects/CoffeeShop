@extends('layouts.app')
@section('content')
    @include('components.sidebar');
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">

                <div class="col-md-12 ">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h4>Users List</h4>
                        </div>
                        <div class="box-body">
                            <table class="table table-hovered">
                                <thead>
                                <tr style="background-color: salmon">
                                    <th class="text-center">id</th>
                                    <th class="text-center">name</th>
                                    <th class="text-center">email</th>
                                    <th class="text-center">isAdmin</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td class="text-center"><a href={{url('/panel/users/edit',$user->id)}}> {{$user->id}}</a></td>
                                        <td class="text-center">{{$user->name}}</td>
                                        <td class="text-center">{{$user->email}}</td>
                                        <td class="text-center">@if($user->isAdmin==0){{'user'}}@else{{'admin'}}@endif</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{--<div class="col-md-12 text-center">--}}
                                {{--{{$users->render('vendor.pagination.bootstrap-4')}}--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
