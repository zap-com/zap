<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="{{ config('app.name', 'Laravel') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/preload.js') }}"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Asap:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Cantarell:ital,wght@0,400;0,700;1,400;1,700&family=Fjalla+One&family=Flamenco:wght@300;400&display=swap"
        rel="stylesheet">
    <!-- Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">
    <link rel="mask-icon" href="{{ asset('images/safari-pinned-tab.svg') }}" color="#e7518b">
    <meta name="apple-mobile-web-app-title" content="Zap!">
    <meta name="application-name" content="Zap!">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css">

    <!--Slider library -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="preload">
    <div id="app">
        @if ($sticky ?? '' === 1)
            <x-nav sticky="1" />
            <x-mobile-modal />
        @else
            <x-nav sticky="0" />
            <x-mobile-modal />
        @endif

        @if (session('message'))
            <div class="container">
                <div class="p-0 msg pt-3">
                    <div class="msgwrapper alert d-flex flex-row justify-content-between">
                        <span>{{ session('message') }}</span>
                        <button type="button" class="nobtn font-weight-bold text-danger" data-dismiss="alert"
                            aria-label="Close">
                            <span aria-hidden="true">{{ __('global.close') }}</span>
                        </button>
                    </div>

                </div>
            </div>
        @endif

        {{ $slot }}

        @if ($sticky ?? '' === 1)
            <x-secondary-modal />
            <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>

            <script src="{{ asset('js/places.js') }}"></script>
        @endif
    </div>
    <x-searchmodal />
    @if ($revisor ?? '' === 1)
        @if ($announcement)
            @foreach ($announcement ?? '' as $announcement)
                <x-warnmodal :ad='$announcement' />
            @endforeach
        @endif
    @endif
    <x-footer />
</body>

</html>
