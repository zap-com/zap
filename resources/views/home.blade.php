<x-app>
    <!-- Heading -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            </div>
            <div class="col-12">
                <h1 class="text-center pt-5 pb-3">Zap, il sito di annunci più che veloce, fulmineo!</h1>
            </div>
        </div>
    </div>
    <div class="container py-2 py-md-5">
        <!-- Remember to change col-md-12 in col-md-7 once you add provinces -->
        <div class="row">

           


            <div class="d-none d-md-flex col-5" style="width:100%"></div>
            <div id="introduction" class="col-12 col-md-7">
                <div class="row pb-4">
                    <div class="col-12">
                        <h2 class="h4 py-3">Chi Siamo</h2>
                        <p>Una digital company in Italia per comprare e vendere <br>Zap, nata nel 2020 come sito
                            d'annunci
                            gratuiti, è tra i primi 50 siti più visitati d'Italia</p>
                        <p>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-md-3 text-center">
                        <i class="icons icon-chart"></i>
                        <p class="pt-2">50mila annunci visti al mese</p>
                    </div>
                    <div class="col-6 col-md-3 text-center">
                        <i class="icons icon-people"></i>
                        <p class="pt-2">200mila utenti attivi</p>
                    </div>

                    <div class="col-6 col-md-3 text-center">
                        <i class="icons icon-bubbles"></i>
                        <p class="pt-2">3 milioni di articoli venduti</p>
                    </div>

                    <div class="col-6 col-md-3 text-center">
                        <i class="icons icon-emotsmile"></i>
                        <p class="pt-2">2 milioni di clienti soddisfatti</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="container align-items-center justify-content-between py-5">
        <div class="row">
            <div class="col-12">
                <div id="trending-slider" class="swiper-container py-3">
                    <div id="trending-wrapper" class="swiper-wrapper">
                    </div>
                    <div class="swiper-button-prev trend-prev"></div>
                    <div class="swiper-button-next trend-next"></div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/truncate.js@1.1.2/truncate.min.js"></script>
    <script src="{{ asset('js/home.js') }}"></script>
</x-app>
