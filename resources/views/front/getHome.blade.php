@extends('master')

@section('title', '')
@section('desc', '')

@section('content')
    @include('front.includes.menu')

    <div class="container">
        <div class="col-lg-4">
            <div class="helene">
                <div class="helene-thumbnail">
                    <img src="{{ url('img/user', $user->thumbnail) }}" alt="{{ trans('front/home.full_name') }}">
                </div>
                <div class="helene-desc">
                    {{ $user->desc }}
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="masonry">
                @foreach($randWorks as $work)
                    <div class="masonry-item">
                        <img src="{{ url('img/work', $work->thumbnail) }}" alt="{{ $work->title }}">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection