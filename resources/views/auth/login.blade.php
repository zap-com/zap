<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('connect.login-title') }} | {{ config('app.name') }}</title>

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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid login-container bg-login">
        <div class="row h-100">
            <div class="col-12 col-md-3 bg-white d-flex flex-column justify-content-start">
                <div class="row">
                    <div class="col-12 pt-5 text-center">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('images/zaplogo.svg') }}" width="75"
                                title="{{ __('global.back-home') }}">
                        </a>
                    </div>
                </div>
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <h1 class="pb-3">{{ __('connect.login-title') }} - {{ config('app.name') }}</h1>
                        <x-authForm />
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        @if (session()->get('locale') == 'en')
                            <button
                                onclick="location.href='{{ route('locale', 'it') }}'; localStorage.setItem('locale','it-IT')"
                                id="notification-button" class="d-flex flex-column justify-content-center mb-3"
                                title="{{ __('global.switch-italian') }}">
                                <img src="{{ asset('icons/italian.svg') }}">
                            </button>
                        @else
                            <button
                                onclick="location.href='{{ route('locale', 'en') }}'; localStorage.setItem('locale','en-GB')"
                                id="notification-button" class="d-flex flex-column justify-content-center mb-3"
                                title="{{ __('global.switch-english') }}">
                                <img src="{{ asset('icons/english.svg') }}">
                            </button>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/authForm.js') }}"></script>
</body>

</html>
