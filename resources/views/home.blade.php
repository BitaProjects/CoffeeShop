@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: lightsalmon;font-weight: bold">{{ __('Welcome!') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Welcome to rockStar Coffee Shop!') }}
                        <br>
                    {{__('Are you a RockStar admin? if Yes')}} <a href="{{ url('/panel') }}">click here</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
