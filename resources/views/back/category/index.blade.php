@extends('master')

@section('title', '')
@section('desc', '')

@section('content')
    @include('back.includes.menu')

    <div class="container">
        <section class="admin">
            <div>
                <a href="{{ route('back.category.create') }}" class="btn btn-default">
                    <i class="fa fa-plus"></i>
                    {{ ucfirst(trans('back/category.create')) }}
                </a>
            </div>
            <br>
            @include('back.category.partials.index')
        </section>
    </div>
@endsection