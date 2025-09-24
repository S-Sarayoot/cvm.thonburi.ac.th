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
        <div id="fade-bg" class="min-h-screen flex flex-col sm:justify-center pt-6 sm:pt-0 bg-white-900">
            <div class="min-h-screen ">
                @include('layouts.navigation')
            <!-- Page Heading -->
            @isset($header)
                <header>
                    <div class="py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            @include('layouts.footer')     
        </div>
        @stack('scripts')
        
        <button 
            onclick="window.scrollTo({top: 0, behavior: 'smooth'});" 
            id="backToTopBtn"
            style="
                position:fixed;
                bottom:40px;
                right:30px;
                z-index:999;
                background: linear-gradient(90deg, #db337f 60%, #c9a14a 100%);
                color: #fff;
                border: none;
                box-shadow: 0 4px 16px rgba(219,51,127,0.15);
                padding: 12px 24px;
                border-radius: 999px;
                cursor:pointer;
                font-weight: bold;
                font-size: 1rem;
                letter-spacing: 1px;
                transition: box-shadow 0.2s;
                display:none;
            "
            onmouseover="this.style.boxShadow='0 6px 24px rgba(219,51,127,0.25)'"
            onmouseout="this.style.boxShadow='0 4px 16px rgba(219,51,127,0.15)'"
        >
            ↑ TOP
        </button>
        <script>
            window.onscroll = function() {
                document.getElementById('backToTopBtn').style.display = (window.scrollY > 200) ? 'block' : 'none';
            };
        </script>
    </body>
</html>
