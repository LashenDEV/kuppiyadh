<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Kuppiya Download Hub') }}</title>
    <link rel="icon" type="image/x-icon" href="{{asset('assets/logos/kuppiya download hub.png')}}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css"/>
    <style>
        .ticker-wrapper-h {
            display: flex;
            position: absolute;
            overflow: hidden;
        }

        .news-ticker-h {
            display: flex;
            margin: 0;
            padding: 0;
            padding-left: 90%;
            z-index: 999;

            animation-iteration-count: infinite;
            animation-timing-function: linear;
            animation-name: tic-h;
            animation-duration: 30s;

        }

        .news-ticker-h:hover {
            animation-play-state: paused;
        }

        .news-ticker-h li {
            display: flex;
            width: 100%;
            align-items: center;
            white-space: nowrap;
            padding-left: 20px;
        }

        @keyframes tic-h {
            0% {
                -webkit-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
                visibility: visible;
            }
            100% {
                -webkit-transform: translate3d(-100%, 0, 0);
                transform: translate3d(-100%, 0, 0);
            }
        }
    </style>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased">
<div class="bg-gray-100 min-h-screen">
@include('layouts.navigation')

<!-- Page Heading -->
    <header class="bg-indigo-50 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </div>
    </header>

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>
<footer class="bg-gray-200 text-center lg:text-left">
    <div class="text-gray-700 text-center p-4" style="background-color: rgba(0, 0, 0, 0.2);">
        Made ❤️ by Lashen DEV
    </div>
</footer>
</body>
</html>
