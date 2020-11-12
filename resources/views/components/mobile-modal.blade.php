<div id="account-modal-input" class="d-block d-md-none position-fixed text-center" data-toggle="modal"
    data-target="#account-modal"><i id="account-modal-icon" class="icons icon-pin"></i>
</div>

<div id="account-modal" class="modal zap-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog h-100" role="document">
        <div class="modal-content h-100">
            <div class="modal-body px-0">
                <a class="d-block py-4 w-100 d-flex align-items-center" href="{{ route('announcement.create') }}">
                    <i class="icons icon-pencil mx-3"></i>
                    <p class="m-0">{{ __('global.create') }}</p>
                </a>

                @guest

                    <a href="{{ route('login') }}" class="d-block py-4 w-100 d-flex align-items-center">
                        <i class="icons icon-login mx-3"></i>
                        <p class="m-0">{{ __('global.login') }}</p>
                    </a>

                @else
                    <a class="d-block py-4 w-100 d-flex align-items-center" href="{{ route('profile.edit') }}">
                        <i class="icons icon-user mx-3"></i>
                        <p class="m-0">{{ __('profile.edit-title') }}</p>
                    </a>
                    @if (Auth::user() && Auth::user()->roles->contains('name', 'revisor'))
                        <a class="d-block py-4 w-100 d-flex align-items-center" href="{{ route('revisor.home') }}">
                            <i class="icons icon-wrench mx-3"></i>
                            <p class="m-0">{{ __('global.revise') }}</p>
                        </a>
                        <a class="d-block py-4 w-100 d-flex align-items-center" href="{{ route('revisor.trash') }}">
                            <i class="icons icon-trash mx-3"></i>
                            <p class="m-0">{{ __('global.trash') }}</p>
                        </a>
                    @else
                        <a class="d-block py-4 w-100 d-flex align-items-center" href="{{ route('works') }}">
                            <i class="icons icon-eyeglass mx-3"></i>
                            <p class="m-0">{{ __('global.careers') }}</p>
                        </a>
                    @endif
                    <a class="d-block py-4 w-100 d-flex align-items-center" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="icons icon-logout mx-3"></i>
                        <p class="m-0">{{ __('global.logout') }}</p>
                    </a>
                    <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest
                @if (session()->get('locale') == 'en')
                    <button
                        onclick="location.href='{{ route('locale', 'it') }}'; localStorage.setItem('locale','it-IT')"
                        id="notification-button" class="d-flex flex-column justify-content-center ml-3"
                        title="{{ __('global.switch-italian') }}">
                        <img src="{{ asset('icons/italian.svg') }}">
                    </button>
                @else
                    <button
                        onclick="location.href='{{ route('locale', 'en') }}'; localStorage.setItem('locale','en-GB')"
                        id="notification-button" class="d-flex flex-column justify-content-center ml-3"
                        title="{{ __('global.switch-english') }}">
                        <img src="{{ asset('icons/english.svg') }}">
                    </button>

                @endif
                <p id="modalcta" class="text-center w-100 px-3">{{ __('global.modal-cta') }}</p>
                <lottie-player src="{{ asset('images/happy.json') }}" class="mx-auto" background="transparent" speed="1"
                    loop autoplay>
                </lottie-player>
            </div>
        </div>
    </div>
</div>
