<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('site.webmanifest') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    
    @php
        $backgrounds = [
            asset('images/bg1.jpg'),
            asset('images/bg2.jpg'),
            //asset('images/bg3.jpg'),
            asset('images/bg4.jpg'),
            asset('images/bg5.jpg'),
            asset('images/bg6.jpg'),
        ];
        $bg = $backgrounds[array_rand($backgrounds)];
    @endphp

    <body class="font-sans text-gray-900 antialiased" style="background-image: url('{{ $bg }}'); background-size: cover; background-position: center;">
        <div id="fade-bg" class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-800 bg-opacity-20 transition-all duration-[2000ms]">
            <div>
                <a href="/">
                    <x-application-logo class="w-32 h-32 fill-current text-[#db337f]" />
                </a>
            </div>


            <div id="fade-login" class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg opacity-0 transition-opacity duration-700">
                {{ $slot }}
            </div>

            
            @push('scripts')
            <script>
                window.addEventListener('DOMContentLoaded', () => {
                    
                    const fadeBg = document.getElementById('fade-bg');
                    fadeBg.classList.remove('bg-opacity-20');
                    fadeBg.classList.add('bg-opacity-80');

                    const fadeLogin = document.getElementById('fade-login');
                    fadeLogin.classList.remove('opacity-0');
                    fadeLogin.classList.add('opacity-80');
                });
            </script>
            @endpush
        </div>
        
        @stack('scripts')
    </body>
</html>

