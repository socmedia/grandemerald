<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="facebook-domain-verification" content="99j6wiklwb50iiobfgv5aepqely0g2" />

    @stack('meta')

    <!-- favicon -->
    <link href="{{asset('images/logo.svg')}}" rel="apple-touch-icon" sizes="144x144" />
    <link href="{{asset('images/logo.svg')}}" rel="apple-touch-icon" sizes="114x114" />
    <link href="{{asset('images/logo.svg')}}" rel="apple-touch-icon" sizes="72x72" />
    <link href="{{asset('images/logo.svg')}}" rel="apple-touch-icon" />
    <link href="{{asset('images/logo.svg')}}" rel="shortcut icon" />

    <link rel="stylesheet" href="{{ asset('css/grandemerald.css') }}">

    @livewireStyles

    @stack('custom-styles')
</head>

<body class="unloaded">

    {{-- Preloader --}}
    <x-preloader />

    {{-- App --}}
    <div id="app" style="display: none;">

        {{-- Navigation --}}
        <x-navigation />

        {{-- Content --}}
        <main>

            {{-- Content --}}
            @yield('content')

            {{-- Footer --}}
            <x-footer />
        </main>
    </div>

    {{-- Script --}}
    <script src="{{ asset('vendor/animejs/anime.min.js') }}"></script>
    <script src="{{ asset('vendor/rellax/rellax.min.js') }}"></script>
    <script src="{{ asset('js/grandemerald.js') }}"></script>

    {{-- @livewireScripts --}}

    @stack('custom-scripts')
</body>

</html>
