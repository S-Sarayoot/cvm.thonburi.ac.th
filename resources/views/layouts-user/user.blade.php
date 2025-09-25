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
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Athiti:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
        
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

    <style>
        

        .athiti-extralight {
        font-family: "Athiti", sans-serif;
        font-weight: 200;
        font-style: normal;
        }

        .athiti-light {
        font-family: "Athiti", sans-serif;
        font-weight: 300;
        font-style: normal;
        }

        .athiti-regular {
        font-family: "Athiti", sans-serif;
        font-weight: 400;
        font-style: normal;
        }

        .athiti-medium {
        font-family: "Athiti", sans-serif;
        font-weight: 500;
        font-style: normal;
        }

        .athiti-semibold {
        font-family: "Athiti", sans-serif;
        font-weight: 600;
        font-style: normal;
        }

        .athiti-bold {
        font-family: "Athiti", sans-serif;
        font-weight: 700;
        font-style: normal;
        }
    </style>

    <body class="font-sans athiti-regular antialiased" >
        <div id="fade-bg" class="flex h-dvh w-dvh bg-white-900">
            <!-- Sidebar -->
            <div class="h-full">
                @auth
                    @if (auth()->user()->is_admin === '1')
                        @include('layouts-admin.sidebar')
                    @else
                        @include('layouts-user.sidebar')
                    @endif
                @endauth
            </div>
        
            <!-- Content -->
            <div class="flex-1 h-full flex flex-col px-2 pb-2">
                <!-- Navbar -->
                <div class="sticky top-0 z-50 bg-white">
                    @include('layouts-user.navigation')
                    @include('layouts-user.menu-mobile-user')
                </div>
        
                <!-- Content scrollable -->
                <div class="flex-1 overflow-y-auto">
                    <main>
                        {{ $slot }}
                    </main>
                    @include('layouts-user.footer')
                </div>
            </div>
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

