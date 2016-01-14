@extends('master')

@section('title', '')
@section('desc', '')

@section('content')
    @include('front.includes.menu')

    <div class="container">
        <section class="masonry masonry-5">
            @foreach($works as $work)
                <div class="masonry-item">
                    <img src="{{ url('img/work', $work->thumbnail) }}" alt="{{ $work->title }}">
                </div>
            @endforeach
        </section>
    </div>
@endsection