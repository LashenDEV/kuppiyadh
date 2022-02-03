<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ __('Kuppiya Download Hub') }}</title>
    <link rel="icon" type="image/x-icon" href="{{asset('assets/logos/kuppiya download hub.png')}}">

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
<body class="antialiased h-fit m-0 p-0 max-h-screen"
      style=" background-image: url('{{ asset('assets/images/background.jpg')}}');background-position: center; background-size: cover; ">
<div>
    <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
        <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
            <div class="flex items-center flex-col w-full">
                <img src="{{asset('assets/logos/kuppiya download hub.png')}}" alt=""
                     class="h-24 w-auto text-gray-700 sm:px-6 sm:h-24 mt-4">
                <h1 class="text-3xl font-medium leading-tight mt-0 mb-2 text-black-600 sm:text-5xl">Kuppiya Download
                    Hub</h1>
                <p class="leading-normal text-2xl mb-4 text-white-100">An one platform to download your all kuppi study
                    materials and links
                    for the recording videos that you have participated. Here you can easily
                </p>
            </div>
            @if (Route::has('login'))
                <div class="px-6 py-4 sm:block flex justify-center w-full">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="text-sm">
                            <button type="button"
                                    class="mx-auto lg:mx-0 hover:underline bg-red-400 text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                Dashboard
                            </button>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm">
                            <button type="button"
                                    class="mx-1 lg:mx-0 hover:underline bg-blue-400 text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                Log in
                            </button>
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="text-sm">
                                or
                                <button type="button"
                                        class="px-2 lg:mx-0 hover:underline bg-red-400 text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                    Register
                                </button>
                            </a>
                        @endif
                    @endauth
                    @endif
                </div>
        </div>
        <!--Right Col-->
        <div class="w-full md:w-3/5 py-6 text-center">
            <img class="w-full md:w-4/5 z-50" src="{{asset('assets/images/hero.png')}}">
        </div>
    </div>
</div>
<div class="text-center inset-x-0 bottom-0 pt-1 pb-1 bg-zinc-200 bg-opacity-25">
    Made ❤️ by Lashen DEV
</div>
</body>
</html>
