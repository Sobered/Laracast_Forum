<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('title')
    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .user-dropdown .dropdown-menu {
            left: 50% !important;
            transform: translateX(-50%) !important;
            top: 100% !important;
        }
        .level { display: flex; align-items: center; }
        .flex { flex: 1;}
    </style>
</head>
<body style='padding-bottom: 100px;'>
    <div id="app">
        @include('layouts.nav')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
