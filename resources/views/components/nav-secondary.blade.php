<div id="filter-row" class="row pb-2">
    <div class="col-12 d-flex flex-row">
        <div class="dropdown nav-dropdown">
            <button class="btn b-btn dropdown-toggle mr-3" type="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                Tutte le categorie
            </button>
            <div id="category-dropdown" class="dropdown-menu dropdown-multicol2" aria-labelledby="dropdownMenuButton">
                @foreach ($categories as $category)
                    <div class="card dropdown-col card-category align-items-center pt-3 h-100">
                        <a href="{{ route('category.index', $category) }}"
                            class="text-decortion-none d-flex align-items-center justify-content-center flex-column">
                            <img class="card-img-top mx-auto" src=".{{ $category->icon }}">
                            <div class="card-body pb-0">
                                <h5 class="card-title text-center mb-1">{{ $category->name }}</h5>
                            </div>
                        </a>

                    </div>
                @endforeach
            </div>
        </div>
        <div class="dropdown nav-dropdown">
            <button class="btn b-btn c-btn dropdown-toggle mr-3" type="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Prezzo
            </button>
            <div id="price-dropdown" class="dropdown-menu p-3" aria-labelledby="dropdownMenuButton">
                <div class="form-group">
                    <label for="formControlRange">Prezzo</label>
                    <input type="range" class="form-control-range" id="formControlRange">
                </div>
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Min">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Max">
                    </div>
                </div>
            </div>
        </div>
        <div class="dropdown nav-dropdown">

            <button class="btn b-btn c-btn dropdown-toggle mr-3" type="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Località
            </button>
            <div id="place-dropdown" class="dropdown-menu p-3" aria-labelledby="dropdownMenuButton">
            <form action="{{route('search.locality')}}" method="GET">
                @csrf
                    <div class="form-group">

                        <input type="text" id="address-input" name="address-input" class="form-control"
                            placeholder="Dove vuoi cercare?">
                        <input type="hidden" id="hiddenplace" name="hiddenplace" value="">
                        <button type="submit">Cerca</button>
                    </div>
                </form>

            </div>
        </div>
        <div class="dropdown nav-dropdown">
            <button class="btn b-btn c-btn dropdown-toggle mr-3" type="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Data
            </button>
            <div id="time-dropdown" class="dropdown-menu pt-3 pb-0" aria-labelledby="dropdownMenuButton">
                <div class="form-group pb-0">
                    <a class="dropdown-item py-3" href="">Oggi</a>
                    <a class="dropdown-item py-3" href="">Ultima settimana</a>
                    <a class="dropdown-item py-3" href="">Ultimo mese</a>
                </div>
            </div>
        </div>
    </div>
</div>
