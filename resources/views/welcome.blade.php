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
<body class="antialiased h-fit m-0 p-0">
<div class="flex flex-col justify-center items-center min-h-screen max-w-screen sm:items-center py-4">
    {{--    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 sm:max-w-80">--}}
    <div class="flex justify-center flex-col items-center">
        <img src="{{asset('assets/logos/kuppiya download hub.png')}}" alt=""
             class="h-24 w-auto text-gray-700 sm:px-6 sm:h-24">
        <h1 class="text-3xl font-medium leading-tight mt-0 mb-2 text-black-600 sm:text-5xl">Kuppiya Download Hub</h1>
    </div>
    <div>
        <img src="{{asset('assets/images/landing image 1.png')}}" alt="" class="h-44 sm:h-60">
    </div>
    <p class="p-6 w-full sm:w-96 text-justify">An one platform to download your all kuppi study materials and
        links for the recording videos that you have participated. Here you can easily <a href="{{ route('login') }}"
                                                                                          class="text-blue-600">log
            in</a> or <a
            href="{{ route('register') }}"
            class="text-blue-600">register</a> to explore the benefits.</p>
    @if (Route::has('login'))
        <div class="px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/dashboard') }}"
                   class="text-sm">
                    <button type="button"
                            class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out w-32">
                        Dashboard
                    </button>
                </a>
            @else
                <a href="{{ route('login') }}" class="text-sm">
                    <button type="button"
                            class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out w-28">
                        Log in
                    </button>
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="text-sm">
                        <button type="button"
                                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-28">
                            Register
                        </button>
                    </a>
                @endif
            @endauth
        </div>
        <div class="fixed text-center inset-x-0 bottom-0 pt-1 pb-1 bg-zinc-200">
            Copyright © <?php echo date("Y"); ?> kuppiya download hub. Made ❤️ by Lashen DEV
        </div>
    @endif
</div>
{{--</div>--}}
</body>
</html>
