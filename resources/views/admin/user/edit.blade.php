@extends('layouts.app')
@section('content')
    @include('components.sidebar');
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="col col-ms-12">
                <div class="box box-primary formBorders">
                    <div class="box-header" >
                        <h4 style="background-color: salmon;padding: 20px">Users Edit page</h4>
                    </div>
                    <form action="{{url('/panel/user/store' , $user->id)}}" method="post" style="padding: 30px">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label> name </label>
                            <input class="form-control" name="name" value="{{$user->name }}">
                        </div>

                        <div class="form-group">
                            <label>email</label>
                            <input class="form-control" name="email" id="email" value="{{$user->email}}">
                        </div>

                        <div class="form-group">
                            <label>isAdmin</label>
                            <input type="checkbox"  name="isAdmin" id="isAdmin"  @if($user->isAdmin==1)checked="checked"  @endif>
                        </div>

                        <button type="submit" class="btn btn-success">submit</button>
                    </form>
                    <div class="box-body">
            </div>
        </div>
                </div>
    </div>
@endsection
