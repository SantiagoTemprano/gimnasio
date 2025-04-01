<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite('resources/css/app.css','resources/js/app.js')
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] font-sans antialiased min-h-screen grid place-items-center">
        @if (Route::has('login'))
            <div class="absolute top-0 right-0 p-6">
                @auth
                    <a
                        href="{{ route('dashboard') }}"
                        class="text-white hover:text-white mr-4"
                    >
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="text-indigo-600 hover:text-indigo-800 mr-4"
                    >
                        Log in
                    </a>
                        <a
                        href="{{ route('register') }}"
                        class="text-indigo-600 hover:text-indigo-800 mr-4"
                    >
                        Register
                    </a>

                @endauth
            </div>
        @endif
        <h1 class="text-7xl text-white">{{ config('app.name') }}</h1>
    </body>
</html>
