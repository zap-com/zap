<nav class="container-fluid navbar-light bg-light justify-content-between">
    <div class="row">
        <div class="col-12 d-flex flex-row py-2 align-items-center">
            <a class="navbar-brand mr-3" href="{{ route('home') }}"><img class="img-fluid"
                    src="{{ asset('images/zaplogo.svg') }}" width="40"></a>
            <form class="form-inline flex-grow-1 mr-0 mr-md-3">
                <!--<div id="searchbar-wrapper" class="d-flex flex-row align-items-center px-3 flex-grow-1">
                    <i class="icon-magnifier icons"></i>
                    <input id="searchbar" class="form-control mr-sm-2 flex-grow-1" type="search" placeholder="Search"
                        aria-label="Search">
                </div>-->
            </form>
            <!--<button id="notification-button" class="mr-0 mr-md-3 d-none d-md-block">
                <i class="icon-bell large-icons"></i>
            </button>-->
            <a class="mr-0 mr-md-3 d-none d-md-block" href=""><button class="btn b-btn disabled">Metti un
                    annuncio</button></a>
            @guest
                <a class="d-none d-md-block" href="{{ route('login') }}"><button id="loginBtn"
                        class="btn b-btn">Login/Registrati</button></a>
            @else
                <!-- User Dropdown -->
                <div class="dropdown">
                    <a id="navbarDropdown" class="d-none d-md-block" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre><button id="loginBtn"
                            class="btn b-btn  dropdown-toggle">{{ Auth::user()->name }}</button></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
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
