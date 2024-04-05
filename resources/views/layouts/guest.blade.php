<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('meta')

    <!-- favicon -->
    <link href="{{ asset('images/logo_secondary.svg') }}" rel="apple-touch-icon" sizes="144x144" />
    <link href="{{ asset('images/logo_secondary.svg') }}" rel="apple-touch-icon" sizes="114x114" />
    <link href="{{ asset('images/logo_secondary.svg') }}" rel="apple-touch-icon" sizes="72x72" />
    <link href="{{ asset('images/logo_secondary.svg') }}" rel="apple-touch-icon" />
    <link href="{{ asset('images/logo_secondary.svg') }}" rel="shortcut icon" />

    <link rel="stylesheet" href="{{ asset('css/grandemerald.css') }}">

    @livewireStyles

    @stack('custom-styles')

    <meta name="facebook-domain-verification" content="waxbudumb0ucxsjdviiaj4p6zm1svo" />
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-MG7WM8CGNV"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-MG7WM8CGNV');
    </script>
    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '749244669930887');
        fbq('track', 'PageView');
    </script>
    <!-- End Meta Pixel Code -->
</head>

<body class="unloaded">
    <noscript><img height="1" width="1" style="display:none"
             src="https://www.facebook.com/tr?id=749244669930887&ev=PageView&noscript=1" /></noscript>
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

    @livewireScripts

    @stack('custom-scripts')
</body>

</html>
