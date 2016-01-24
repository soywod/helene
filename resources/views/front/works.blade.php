@extends('master')

@section('title', '')
@section('desc', '')

@section('content')
    @include('front.includes.menu')

    <div class="container">
        <ul class="category-menu">
            @foreach(App\Category::all() as $category)
                <li class="{{ Request::segment(2) === $category->slug ? 'active' : '' }}">
                    <a href="{{ route('front.works', ['category' => $category->slug]) }}">
                        {{ Lang::has('category.' . $category->slug) ? ucfirst(Lang::get('category.' . $category->slug)) : ucfirst($category->name) }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="container">
        @include('front.partials.work.index')
    </div>
@endsection