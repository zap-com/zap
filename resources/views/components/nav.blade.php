<nav class="container-fluid navbar-light bg-light justify-content-between">
    <div class="row">
        <div class="col-12 d-flex flex-row py-2 align-items-center">
            <a class="navbar-brand mr-3" href="{{ route('home') }}"><img class="img-fluid"
                    src="{{ asset('images/zaplogo.svg') }}" width="40"></a>
            <form class="form-inline flex-grow-1 mr-0 mr-md-3">
                <div id="searchbar-wrapper" class="d-flex flex-row align-items-center px-3 flex-grow-1">
                    <i class="icon-magnifier icons"></i>
                    <input id="searchbar" class="form-control mr-sm-2 flex-grow-1" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="btn-group">
                        <button type="button" class="nobtn text-muted dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Tutte le categorie
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Tutte le categorie</a>
                            @foreach ($categories as $category)
                                <a class="dropdown-item" href="#">{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </div>

                </div>
            </form>
            <!--<button id="notification-button" class="mr-0 mr-md-3 d-none d-md-block">
                <i class="icon-bell large-icons"></i>
            </button>-->
            <a class="mr-0 mr-md-3 d-none d-md-block" href="{{ route('announcement.create') }}"><button
                    class="btn b-btn">Inserisci un
                    annuncio</button></a>
            @guest
                <a class="d-none d-md-block" href="{{ route('login') }}"><button id="loginBtn"
                        class="btn b-btn">Login/Registrati</button></a>
            @else
                <!-- User Dropdown -->
                <div class="dropdown">
                    <button id="loginBtn" class="btn b-btn  dropdown-toggle" type="button" id="dMenuButton"
                        data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">{{ Auth::user()->name }}</button></a>
                    <div class="dropdown-menu dropdown-menu-right bg-white" aria-labelledby="dMenuButton">
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
