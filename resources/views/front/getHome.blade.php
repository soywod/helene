@extends('master')

@section('title', '')
@section('desc', '')

@section('content')
    @include('front.includes.menu')

    <div class="container helene-container">
        <div class="col-lg-4">
            <section class="helene">
                <div class="helene-thumbnail">
                    <img src="{{ url('img/user', $user->thumbnail) }}" alt="{{ trans('front/home.full_name') }}">
                </div>
                <div class="helene-desc">
                    {{ $user->desc }}
                </div>
            </section>
        </div>
        <div class="col-lg-8">
            <section class="masonry masonry-3">
                @foreach($randWorks as $work)
                    @include('front.partials.work.show')
                @endforeach
            </section>
        </div>
    </div>
@endsection