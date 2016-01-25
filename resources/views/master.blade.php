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

        @yield('content')

        <div class="loader" style="display: none">
            <i class="fa fa-refresh fa-5x fa-spin"></i>
        </div>

        @if(Session::has('message'))
            <div class="popup">
                {{ Session::get('message') }}
            </div>
        @endif

        @section('js')
            <script src="{{ asset('js/vendors.min.js') }}"></script>
            <script src="{{ asset('js/master.min.js') }}"></script>
        @show
    </body>
</html>