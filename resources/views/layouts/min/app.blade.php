<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ridge @yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('font/material-icons.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="16x16 32x32" type="image/png">
</head>
<body class="is-clipped has-navbar-fixed-bottom">
    @include('partials.navigation')

    @yield('content')

    @include('partials.footer')
    @include('modals.prompt')
    @include('modals.feedbacks')

    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
    @yield('scripts')
</body>
</html>
