<nav
    class="container-fluid {{ $sticky ?? '' === 1 ? 'sticky-top' : '' }} navbar-light bg-light justify-content-between">
    <div class="row">
        <div class="col-12 d-flex flex-row py-2 align-items-center">
            <a class="navbar-brand mr-3" href="{{ route('home') }}" title="{{ __('global.back-home') }}"><img
                    class="img-fluid" src="{{ asset('images/zaplogo.svg') }}" width="40"></a>
            <form class="form-inline flex-grow-1 mr-0 mr-md-3" action="{{ route('search') }}" method="GET">
                @csrf
                <div id="searchbar-wrapper" class="d-flex flex-row align-items-center px-3 flex-grow-1">
                    <i class="icon-magnifier icons"></i>
                    <input id="searchbar" class="form-control mr-sm-2 flex-grow-1" type="search"
                        placeholder="{{ __('global.search') }}" name="q" aria-label="Search" autocomplete="off">
                    <div class="btn-group">
                        <button id="catsearch" type="button" class="nobtn text-muted dropdown-toggle d-none d-md-block"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="c">
                            {{ __('global.all-categories') }}
                        </button>
                        <button id="catsearchmobile" type="button"
                            class="nobtn text-muted dropdown-toggle d-block d-md-none" data-toggle="modal"
                            data-target="#search-modal">
                            {{ __('global.all-categories') }}
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <input type="radio" id="cat" class="d-none">
                            <label for="cat"
                                class="dropdown-item align-items-start justify-content-start">{{ __('global.all-categories') }}</label>

                            @foreach ($categories as $category)
                                <input type="radio" name="cat" id="cat-{{ $category->id }}" value="{{ $category->id }}"
                                    class="d-none">
                                <label for="cat-{{ $category->id }}"
                                    class="dropdown-item align-items-start justify-content-start">
                                    @if (session()->get('locale') == 'it')
                                        {{ $category->name_it }}
                                    @else
                                        {{ $category->name }}
                                    @endif
                                </label>
                                {{-- <a class="dropdown-item"
                                    href="#">{{ $category->name }}</a> --}}
                            @endforeach

                        </div>
                    </div>

                </div>
            </form>
            <!--<button id="notification-button" class="mr-0 mr-md-3 d-none d-md-block">
                <i class="icon-bell large-icons"></i>
            </button>-->
            @auth
                {{-- Notification bell --}}



                @if (Auth::user() && Auth::user()->roles->contains('name', 'revisor') && App\Models\Announcement::toBeRevisedCount() > 0)
                    <a href="{{ route('revisor.home') }}">
                        <button id="notification-button" class="mr-0 mr-md-3 d-none d-md-block">
                            <i class="icon-bell large-icons"></i>

                            <div class="small mt-n2">{{ App\Models\Announcement::toBeRevisedCount() }}</span>
                        </button>
                    </a>
                @endif
            @endauth

            <a class="mr-0 mr-md-3 d-none d-md-block" href="{{ route('announcement.create') }}"><button
                    class="btn b-btn">{{ __('global.create') }}</button></a>
            @guest
                <a class="d-none d-md-block mr-md-3" href="{{ route('login') }}"><button id="loginBtn"
                        class="btn b-btn">{{ __('global.login') }}</button></a>
            @else
                <!-- User Dropdown -->
                <div class="dropdown">
                    <button id="loginBtn" class="btn b-btn mr-md-3 dropdown-toggle d-none d-md-block" type="button"
                        id="dMenuButton" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">{{ Auth::user()->name }}</button></a>
                    <div class="dropdown-menu dropdown-menu-right bg-white" aria-labelledby="dMenuButton">
                        <a class="dropdown-item" href="{{ route('profile.edit') }}"> {{ __('profile.edit-title') }} </a>
                        @if (Auth::user() && Auth::user()->roles->contains('name', 'revisor'))
                            <a class="dropdown-item" href="{{ route('revisor.home') }}">
                                {{ __('global.revise') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('revisor.trash') }}">
                                Trash
                            </a>
                        @else
                            <a class="dropdown-item" href="{{ route('works') }}">
                                {{ __('global.careers') }}
                            </a>
                        @endif
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('global.logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            @endguest

            @if (session()->get('locale') == 'en')
                <button onclick="location.href='{{ route('locale', 'it') }}'; localStorage.setItem('locale','it-IT')"
                    id="notification-button" class="d-none d-md-flex flex-column justify-content-center"
                    title="{{ __('global.switch-italian') }}">
                    <img src="{{ asset('icons/italian.svg') }}">
                </button>
            @else
                <button onclick="location.href='{{ route('locale', 'en') }}'; localStorage.setItem('locale','en-GB')"
                    id="notification-button" class="d-none d-md-flex flex-column justify-content-center"
                    title="{{ __('global.switch-english') }}">
                    <img src="{{ asset('icons/english.svg') }}">
                </button>

            @endif
        </div>
    </div>
    @if ($sticky ?? '' === 1)
        <x-nav-secondary />
    @else
    @endif
</nav>
