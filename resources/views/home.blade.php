<x-app sticky="0">

    <section class="container">
        <div class="row">
            <div class="col-12">
                <div id="category-slider" class="swiper-container py-3">
                    <div id="category-wrapper" class="swiper-wrapper">
                    </div>
                    <div class="swiper-scrollbar d-flex d-md-none"></div>
                </div>
                <div class="swiper-button-prev cat-prev d-none d-md-flex"></div>
                <div class="swiper-button-next cat-next d-none d-md-flex"></div>
            </div>
        </div>
    </section>

    <section class="container py-2 py-md-5">
        <!-- Remember to change col-md-12 in col-md-7 once you add provinces -->
        <div class="row">
            <div class="d-none d-md-flex col-5">
                <div class="row pb-4">
                    <div class="col-12">
                        <h2 class="h4 py-3">{{ __('home.region-search') }}</h2>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-3 text-center">
                            <x-map />
                        </div>
                    </div>
                </div>
            </div>
            <div id="introduction" class="col-12 col-md-7">
                <div class="row pb-4">
                    <div class="col-12">
                        <h2 class="h4 py-3">{{ __('home.about-us') }}</h2>
                        <p>{{ __('home.about-us-p1') }}<br>{{ __('home.about-us-p2') }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-md-3 text-center">
                        <i class="icons icon-chart text-primary"></i>
                        <p class="pt-2"><b>50 {{ __('global.t') }}</b> {{ __('home.stat-listings') }}</p>
                    </div>
                    <div class="col-6 col-md-3 text-center">
                        <i class="icons icon-people text-primary"></i>
                        <p class="pt-2"><b>100 {{ __('global.t') }}</b> {{ __('home.stat-users') }}</p>
                    </div>

                    <div class="col-6 col-md-3 text-center">
                        <i class="icons icon-bubbles text-primary"></i>
                        <p class="pt-2"><b>3 {{ __('global.m') }}</b> {{ __('home.stat-sold') }}</p>
                    </div>

                    <div class="col-6 col-md-3 text-center">
                        <i class="icons icon-emotsmile text-primary"></i>
                        <p class="pt-2"><b>500 {{ __('global.t') }}</b> {{ __('home.stat-satisfied') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container align-items-center justify-content-between py-5">
        <div class="row justify-content-between mx-0">
            <h2>{{ __('home.trending') }}</h2>
            <div class="dropdown">
                <button class="b-btn dropdown-toggle dropdown-menu-right px-3 d-none d-md-block" type="button"
                    id="dMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ __('home.where') }}
                </button>
                <div id="regionDropdown" class="dropdown-menu dropdown-menu-right bg-white"
                    aria-labelledby="dMenuButton">
                    <a class="dropdown-item" href="{{ route('region', ['regione' => 'abruzzo']) }}">Abruzzo</a>
                    <a class="dropdown-item" href="{{ route('region', ['regione' => 'basilicata']) }}">Basilicata</a>
                    <a class="dropdown-item" href="{{ route('region', ['regione' => 'calabria']) }}">Calabria</a>
                    <a class="dropdown-item" href="{{ route('region', ['regione' => 'campania']) }}">Campania</a>
                    <a class="dropdown-item"
                        href="{{ route('region', ['regione' => 'emilia-romagna']) }}">Emilia-Romagna</a>
                    <a class="dropdown-item"
                        href="{{ route('region', ['regione' => 'friuli-venezia-giulia']) }}">Friuli-Venezia Giulia</a>
                    <a class="dropdown-item" href="{{ route('region', ['regione' => 'lazio']) }}">Lazio</a>
                    <a class="dropdown-item" href="{{ route('region', ['regione' => 'liguria']) }}">Liguria</a>
                    <a class="dropdown-item" href="{{ route('region', ['regione' => 'lombardia']) }}">Lombardia</a>
                    <a class="dropdown-item" href="{{ route('region', ['regione' => 'marche']) }}">Marche</a>
                    <a class="dropdown-item" href="{{ route('region', ['regione' => 'molise']) }}">Molise</a>
                    <a class="dropdown-item" href="{{ route('region', ['regione' => 'piemonte']) }}">Piemonte</a>
                    <a class="dropdown-item" href="{{ route('region', ['regione' => 'puglia']) }}">Puglia</a>
                    <a class="dropdown-item" href="{{ route('region', ['regione' => 'sardegna']) }}">Sardegna</a>
                    <a class="dropdown-item" href="{{ route('region', ['regione' => 'sicilia']) }}">Sicilia</a>
                    <a class="dropdown-item" href="{{ route('region', ['regione' => 'toscana']) }}">Toscana</a>
                    <a class="dropdown-item"
                        href="{{ route('region', ['regione' => 'trentino-alto-adige-sudtirol']) }}">Trentino-Alto
                        Adige</a>
                    <a class="dropdown-item" href="{{ route('region', ['regione' => 'umbria']) }}">Umbria</a>
                    <a class="dropdown-item"
                        href="{{ route('region', ['regione' => 'valle-d-aosta-vallee-d-aoste']) }}">Valle d'Aosta</a>
                    <a class="dropdown-item" href="{{ route('region', ['regione' => 'veneto']) }}">Veneto</a>
                </div>
            </div>
            <button class="b-btn dropdown-toggle dropdown-menu-right px-3 d-block d-md-none" type="button"
                id="dMenuButton" data-toggle="modal" data-target="#region-modal">
                {{ __('home.where') }}
            </button>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="trending-slider" class="swiper-container py-3">
                    <div id="trending-wrapper" class="swiper-wrapper">
                    </div>
                    <div class="swiper-scrollbar d-flex d-md-none"></div>
                </div>
                <div class="swiper-button-prev trend-prev d-none d-md-flex"></div>
                <div class="swiper-button-next trend-next d-none d-md-flex"></div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/truncate.js@1.1.2/truncate.min.js"></script>
    <script src="{{ asset('js/cardCarousel.js') }}"></script>
    <script src="{{ asset('js/catCarousel.js') }}"></script>
    <x-regionmodal />
</x-app>
