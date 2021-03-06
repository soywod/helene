@extends('master')

@section('title', '')
@section('desc', '')

@section('content')
    @include('back.includes.menu')

    <div class="container">
        <section class="admin">
            <div>
                <a href="{{ route('back.work.create') }}" class="btn btn-default">
                    <i class="fa fa-plus"></i>
                    {{ ucfirst(trans('back/work.create')) }}
                </a>
            </div>
            <br>
            @include('back.work.partials.index')
        </section>
    </div>
@endsection