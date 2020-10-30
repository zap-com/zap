<div id="account-modal-input" class="d-block d-md-none position-fixed  text-center" data-toggle="modal"
    data-target="#account-modal"><i id="account-modal-icon" class="icons icon-pin"></i>
</div>

<div id="account-modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog h-100" role="document">
        <div class="modal-content h-100">
            <div class="modal-body px-0">
                @guest

                    <a href="{{ route('login') }}" class="d-block py-4 w-100 d-flex align-items-center">
                        <i class="icons icon-login mx-3"></i>
                        <p class="m-0">Login/Registrati</p>
                    </a>

                @else

                @endguest
                <a class="d-block py-4 w-100 d-flex align-items-center">
                    <i class="icons icon-bell mx-3"></i>
                    <p class="m-0">Leggi le notifiche</p>
                </a>
                <a class="d-block py-4 w-100 d-flex align-items-center">
                    <i class="icons icon-pencil mx-3"></i>
                    <p class="m-0">Metti un annuncio</p>
                </a>
                <p id="modalcta" class="text-center w-100 px-3">Vendere il tuo usato non è mai stato così veloce! Cosa
                    stai aspettando?</p>
                <lottie-player src="{{ asset('images/happy.json') }}" class="mx-auto" background="transparent" speed="1"
                    loop autoplay>
                </lottie-player>
            </div>
        </div>
    </div>
</div>
