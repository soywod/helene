@extends('master')

@section('title', '')
@section('desc', '')

@section('content')
    @include('back.includes.menu')

    <div class="container">
        <section class="admin">
            @include('back.partials.work.edit')
        </section>
    </div>
@endsection