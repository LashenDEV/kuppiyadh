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
<div class="flex flex-col justify-center items-center min-h-screen max-w-screen sm:items-center py-4">
    {{--    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 sm:max-w-80">--}}
    <div class="flex justify-center flex-col items-center">
        <img src="{{asset('images/logos/kuppiya download hub.png')}}" alt=""
             class="h-24 w-auto text-gray-700 sm:px-6 sm:h-24">
        <h1 class="text-3xl font-medium leading-tight mt-0 mb-2 text-black-600 sm:text-5xl">Kuppiya Download Hub</h1>
    </div>
    <div>
        <img src="{{asset('images/landing image 1.png')}}" alt="" class="h-60 sm:h-30">
    </div>
    @if (Route::has('login'))
        <div class="px-6 py-4 sm:block">
            @auth
                <button type="button"
                        class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out w-32">
                    <a href="{{ url('/dashboard') }}"
                       class="text-sm">Dashboard</a>
                </button>
            @else
                <button type="button"
                        class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out w-28">
                    <a href="{{ route('login') }}" class="text-sm">Log in</a>
                </button>

                @if (Route::has('register'))
                    <button type="button"
                            class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-28">
                        <a href="{{ route('register') }}"
                           class="text-sm">Register</a>
                    </button>
                @endif
            @endauth
        </div>
        <div class="absolute text-center inset-x-0 bottom-0 pt-2 pb-2 bg-zinc-200">Made ❤️ by Lashen DEV</div>
    @endif
</div>
{{--</div>--}}
</body>
</html>
