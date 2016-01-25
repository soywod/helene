@extends('master')

@section('title', '')
@section('desc', '')

@section('content')
    @include('back.includes.menu')

    <div class="container">
        <section class="admin">
            <form class="form-horizontal" method="POST" action="{{ route('back.profile.post') }}">

                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                    <label for="profile-thumbnail" class="col-sm-2 control-label">{{ ucfirst(trans('general.photo')) }}</label>
                    <div class="col-sm-10">
                        <div class="profile-thumbnail">
                            <img id="profile-thumbnail" src="{{ url('img/user', Auth::user()->thumbnail) }}" alt="{{ ucfirst(Lang::get('general.helene_thumbnail')) }}">
                            <div class="profile-thumbnail-edit" data-token="{{ csrf_token() }}" style="display: none">
                                <i class="fa fa-3x fa-pencil-square-o"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
                    <label for="profile-desc" class="col-sm-2 control-label">{{ ucfirst(trans('general.desc')) }}</label>
                    <div class="col-sm-10">
                        <textarea name="desc" class="form-control" id="profile-desc" rows="10">{{ old('desc') ?? Auth::user()->desc }}</textarea>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="profile-password" class="col-sm-2 control-label">{{ ucfirst(trans('general.change_password')) }}</label>
                    <div class="col-sm-10">
                        <input id="profile-password" name="password" type="password" class="form-control">
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="profile-password-confirm" class="col-sm-2 control-label">{{ ucfirst(trans('general.confirm')) }}</label>
                    <div class="col-sm-10">
                        <input id="profile-password-confirm" name="password_confirmation" type="password" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10 text-right">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-floppy-o"></i>
                            {{ ucfirst(trans('general.save')) }}
                        </button>
                    </div>
                </div>

            </form>
        </section>
    </div>
@endsection