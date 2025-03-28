<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Treant.js Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/treant-js/1.0/Treant.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/treant-js/1.0/vendor/perfect-scrollbar.min.css" />

        <!-- Fontawesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-mOgCyUbgkHrGeBSSZCdWT1YuWx2LBfmrNHmspA5nN5/2I5GPVL+dxtJr52tYtO03qMb7rfz8zpdc5wZKX+BxRg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Favicons -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/bscgen-logo.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/bscgen-logo.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/bscgen-logo.png') }}">
        <link rel="manifest" href="{{ asset('images/bscgen-logo.png') }}">
        <link rel="mask-icon" href="{{ asset('images/bscgen-logo.png') }}" color="#3490dc">
        <meta name="theme-color" content="#3490dc">
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/treant-js/1.0/Treant.min.js"></script>
    </body>
</html>
