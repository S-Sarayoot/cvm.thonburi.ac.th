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
        
        <style>
            .dt-length select {
                min-width: 50px !important;
                width: 70px !important;
            }
            
            .dt-paging-button.current {
                color:#db337f!important;
                background: none !important;
                border: 1px solid #db337f !important;
            }
            .dt-paging-button:hover {
                color:#db337f!important;
                background: #db337f !important;
                border: 1px solid #db337f !important;
            }
        </style>
        
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen">
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
                background: linear-gradient(90deg, #6e2473 40%, #8a438f 100%);
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
