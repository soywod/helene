@extends('master')

@section('title', '')
@section('desc', '')

@section('content')
    @include('front.includes.menu')

    <div class="container">
        <ul class="category-menu">
            @foreach(App\Category::all() as $category)
                <li class="{{ Request::segment(2) === $category->slug ? 'active' : '' }}">
                    <a href="{{ route('works', ['category' => $category->slug]) }}">
                        {{ trans('front/menu.' . $category->slug) }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="container">
        <section class="masonry masonry-5">
            @foreach($works as $work)
                @include('front.includes.getWork')
            @endforeach
        </section>
    </div>
@endsection