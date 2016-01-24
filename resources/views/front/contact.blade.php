@extends('master')

@section('title', '')
@section('desc', '')

@section('content')
    @include('front.includes.menu')

    <div class="container">
        <form id="contact-form" class="form-horizontal" method="POST" action="{{ route('front.contact.post') }}">

            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="contact-name" class="col-sm-2 control-label">{{ ucfirst(trans('general.name')) }}</label>
                <div class="col-sm-10">
                    <input id="contact-name" name="name" type="text" class="form-control" value="{{ old('name') }}">
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="contact-email" class="col-sm-2 control-label">{{ ucfirst(trans('general.email')) }}</label>
                <div class="col-sm-10">
                    <input id="contact-email" name="email" type="text" class="form-control" value="{{ old('email') }}">
                </div>
            </div>

            <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
                <label for="contact-tel" class="col-sm-2 control-label">{{ ucfirst(trans('general.tel')) }}</label>
                <div class="col-sm-10">
                    <input id="contact-tel" name="tel" type="text" class="form-control" value="{{ old('tel') }}">
                </div>
            </div>

            <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                <label for="contact-message" class="col-sm-2 control-label">{{ ucfirst(trans('general.message')) }}</label>
                <div class="col-sm-10">
                    <textarea name="message" id="contact-message" class="form-control" rows="10">{{ old('message') }}</textarea>
                </div>
            </div>

            <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                <label for="contact-captcha" class="col-sm-2 control-label">{{ ucfirst(trans('general.captcha')) }}</label>
                <div class="col-sm-10">
                    <div id="contact-captcha" class="g-recaptcha" data-sitekey="{{ $captchaSecret }}"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10 text-right">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-send"></i>
                        {{ ucfirst(trans('general.send')) }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('js')
    @parent
    <script src="https://www.google.com/recaptcha/api.js"></script>
@endsection