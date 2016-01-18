@extends('master')

@section('title', '')
@section('desc', '')

@section('content')
    @include('back.includes.menu')

    <div class="container">
        @include('back.partials.category.index')
    </div>
@endsection