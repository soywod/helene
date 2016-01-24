@extends('master')

@section('title', '')
@section('desc', '')

@section('content')
    @include('front.includes.menu')

    <div class="container">
        <form class="form-horizontal" method="POST" action="{{ route('auth.login.post') }}">

            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="login-name" class="col-sm-2 control-label">{{ ucfirst(trans('general.name')) }}</label>
                <div class="col-sm-10">
                    <input id="login-name" name="name" type="text" class="form-control" value="{{ old('name') }}">
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="login-password" class="col-sm-2 control-label">{{ ucfirst(trans('general.password')) }}</label>
                <div class="col-sm-10">
                    <input id="login-password" name="password" type="password" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10 text-right">
                    <button type="submit" class="btn btn-default">
                        {{ ucfirst(trans('general.connect')) }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection