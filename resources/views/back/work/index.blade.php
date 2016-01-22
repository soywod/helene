@extends('master')

@section('title', '')
@section('desc', '')

@section('content')
    @include('back.includes.menu')

    <div class="container">
        <section class="admin">
            <a href="{{ route('back.work.create') }}">
                <button class="btn btn-default text-capitalize">
                    {{ trans('back/work.create') }}
                </button>
            </a>
            @include('back.partials.work.index')
        </section>
    </div>
@endsection