<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>@yield('title')</title>
        <meta name="description" content="@yield('desc')">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="">
        @section('css')
            <link href="{{ asset('css/vendors.min.css') }}" rel="stylesheet">
            <link href="{{ asset('css/master.min.css') }}" rel="stylesheet">
        @show
    </head>
    <body>
        <!--[if lt IE 8]>
        <p class="browserupgrade">
            You are using an
            <strong>outdated</strong>
            browser. Please
            <a href="http://browsehappy.com/">upgrade your browser</a>
            to improve your experience.
        </p><![endif]-->

        @if(Session::has('message'))
            <div class="container">
                <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ Session::get('message') }}
                </div>
            </div>
        @endif

        @yield('content')

        @section('js')
            <script src="{{ asset('js/vendors.min.js') }}"></script>
            <script src="{{ asset('js/master.min.js') }}"></script>
        @show
    </body>
</html>