<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
<div class="flex items-top justify-center min-h-screen max-w-screen sm:items-center py-4">
{{--    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 sm:max-w-80">--}}
        <div class="flex justify-center">
            <img src="{{asset('images/logos/kuppiya download hub.png')}}" alt=""
                 class="h-16 w-auto text-gray-700 sm:px-6 sm:h-20">

            <p class="m-2 h-10 sm:text-left">Kuppiya Download Hub</p>
        </div>
        @if (Route::has('login'))
            <div class="px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
{{--</div>--}}
</body>
</html>
