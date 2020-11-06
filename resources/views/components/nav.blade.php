<nav class="container-fluid navbar-light bg-light justify-content-between">
    <div class="row">
        <div class="col-12 d-flex flex-row py-2 align-items-center">
            <a class="navbar-brand mr-3" href="{{ route('home') }}" title="{{ __('global.back-home') }}"><img
                    class="img-fluid" src="{{ asset('images/zaplogo.svg') }}" width="40"></a>
            <form class="form-inline flex-grow-1 mr-0 mr-md-3" action="{{ route('search') }}" method="GET">
                @csrf
                <div id="searchbar-wrapper" class="d-flex flex-row align-items-center px-3 flex-grow-1">
                    <i class="icon-magnifier icons"></i>
                    <input id="searchbar" class="form-control mr-sm-2 flex-grow-1" type="search"
                        placeholder="{{ __('global.search') }}" name="q" aria-label="Search">
                    <div class="btn-group">
                        <button type="button" class="nobtn text-muted dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" name="c">
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
                                    class="dropdown-item align-items-start justify-content-start">{{ $category->name }}</label>
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
            <a class="mr-0 mr-md-3 d-none d-md-block" href="{{ route('announcement.create') }}"><button
                    class="btn b-btn">{{ __('global.create') }}</button></a>
            @guest
                <a class="d-none d-md-block" href="{{ route('login') }}"><button id="loginBtn"
                        class="btn b-btn">{{ __('global.login') }}</button></a>
            @else
                <!-- User Dropdown -->
                <div class="dropdown">
                    <button id="loginBtn" class="btn b-btn  dropdown-toggle" type="button" id="dMenuButton"
                        data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">{{ Auth::user()->name }}</button></a>
                    <div class="dropdown-menu dropdown-menu-right bg-white" aria-labelledby="dMenuButton">

                        @if (Auth::user() && Auth::user()->roles->contains('name', 'revisor'))
                            <a class="dropdown-item" href="{{ route('revisor.home') }}">
                                {{ __('global.revise') }}
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
        </div>
    </div>
</nav>
