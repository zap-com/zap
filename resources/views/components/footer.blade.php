<footer class="footer font-small bg-light mt-5 mt-md-0">
    <div class="container text-center text-md-left">
        <div class="row">
            <div class="col-md-3 mx-auto d-flex flex-column justify-content-between">

                <!-- Links -->
                <a class="navbar-brand mt-3 mb-2 py-0" href="{{ route('home') }}"
                    title="{{ __('global.back-home') }}"><img class="img-fluid" src="{{ asset('images/zaplogo.svg') }}"
                        width="40"></a>

                <ul class="list-unstyled">
                    <li>
                        <p class="my-0">{{ __('global.vat') }}: 09825600019</p>
                    </li>
                    <li>
                        <p class="my-0">{{ __('global.tel') }} 080 1234567</p>
                    </li>
                    <li>
                        <p class="my-0">{{ __('global.address') }}: Via da Qui 15,
                            Bari, BA 70121, {{ __('global.italy') }}</p>
                    </li>
                </ul>

            </div>

            <hr class="clearfix w-100 d-md-none">

            <div class="col-md-3 mx-auto">

                <h5 class="font-weight-bold text-uppercase mt-3 mb-4">{{ __('global.useful-links') }}</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="#!">{{ __('global.my-listings') }}</a>
                    </li>
                    <li>
                        <a href="#!">{{ __('global.bookmarks') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('works') }}">{{ __('global.careers') }}</a>
                    </li>
                    <li>
                        <a href="#!">{{ __('global.contact') }}</a>
                    </li>
                </ul>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">

            <!-- Grid column -->
            <div class="col-md-3 mx-auto">

                <!-- Links -->
                <h5 class="font-weight-bold text-uppercase mt-3 mb-4">{{ __('global.help') }}</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="#!">{{ __('global.faq') }}</a>
                    </li>
                    <li>
                        <a href="#!">{{ __('global.privacy') }}</a>
                    </li>
                    <li>
                        <a href="#!">{{ __('global.press') }}</a>
                    </li>
                    <li>
                        <a href="#!">{{ __('global.tac') }}</a>
                    </li>
                </ul>

            </div>
        </div>
        </section>
    </div>


    <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="{{ route('home') }}">Zap</a> {{ __('global.rights') }}.
    </div>

</footer>
