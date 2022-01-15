<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @yield('og-metadata')

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;600;700&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600&display=swap" rel="stylesheet"> 

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/tailwindcss.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">

        <!-- Font awesome icons -->
        <script src="https://kit.fontawesome.com/983b1bd0fa.js" crossorigin="anonymous"></script>

        <!-- Livewire Styles -->
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>

    <body class="antialiased overflow-x-hidden">
        <div class="min-h-screen">
            <!-- Page header -->
            @yield('header')

            <!-- Page Content -->
            <main>
                @yield('main-content')
            </main>

            <!-- Footer -->
            @include('footer.footer')
        </div>

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        @livewireScripts
        @yield('scripts')
    </body>
</html>
