<div id="filter-row" class="row pb-2">
    <div class="col-12 d-flex flex-row">
        <div class="dropdown nav-dropdown">
            <button class="btn b-btn dropdown-toggle mr-3 d-none d-md-block" type="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                {{ __('global.choose-category') }}
            </button>
            <div id="category-dropdown" class="dropdown-menu dropdown-multicol2" aria-labelledby="dropdownMenuButton">
                <div class="card dropdown-col card-category align-items-center pt-3 h-100">
                    <a href="{{ route('announcement.index') }}"
                        class="text-decortion-none d-flex align-items-center justify-content-center flex-column">
                        <img class="card-img-top mx-auto" src="/icons/all.svg">
                        <div class="card-body pb-0">
                            <h5 class="card-title text-center mb-1">{{ __('global.all-categories') }}</h5>
                        </div>
                    </a>

                </div>
                @foreach ($categories as $category)
                    <div class="card dropdown-col card-category align-items-center pt-3 h-100">
                        <a href="{{ route('category.index', $category) }}"
                            class="text-decortion-none d-flex align-items-center justify-content-center flex-column">
                            <img class="card-img-top mx-auto" src=".{{ $category->icon }}">
                            <div class="card-body pb-0">
                                <h5 class="card-title text-center mb-1">
                                    @if (session()->get('locale') == 'it')
                                        {{ $category->name_it }}
                                    @else
                                        {{ $category->name }}
                                    @endif
                                </h5>
                            </div>
                        </a>

                    </div>
                @endforeach
            </div>
        </div>
        <button class="btn b-btn dropdown-toggle mr-3 d-block d-md-none" type="button" data-toggle="modal"
            data-target="#category-modal">
            {{ __('global.choose-category') }}
        </button>

        <div class="dropdown nav-dropdown">
            <button class="btn alt-btn dropdown-toggle mr-3" type="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                {{ __('global.price') }}
            </button>
            <div id="price-dropdown" class="dropdown-menu p-3" aria-labelledby="dropdownMenuButton">
                <div class="form-group">
                    <label for="formControlRange">{{ __('global.price') }}</label>
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

            <button class="btn alt-btn dropdown-toggle mr-3 d-none d-md-block" type="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                {{ __('global.place') }}
            </button>
            <div id="place-dropdown" class="dropdown-menu p-3" aria-labelledby="dropdownMenuButton">
                <form action="{{ route('search.locality') }}" method="GET">
                    @csrf
                    <div class="form-group">
                        <div class="d-flex flex-row">
                            <input type="hidden" id="hiddenplace" name="hiddenplace" value="">
                            <input type="text" id="address-input" name="address-input" class="form-control"
                                placeholder="{{ __('global.search-place') }}">

                            <button class="btn b-btn ml-3" type="submit">{{ __('global.search-btn') }}</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <button class="btn alt-btn dropdown-toggle mr-3 d-block d-md-none" type="button" data-toggle="modal"
            data-target="#place-modal">
            {{ __('global.place') }}
        </button>
        <div class="dropdown nav-dropdown">
            <button class="btn alt-btn dropdown-toggle mr-3 d-none d-md-block" type="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                {{ __('global.date') }}
            </button>
            <div id="time-dropdown" class="dropdown-menu pt-3 pb-0" aria-labelledby="dropdownMenuButton">
                <div class="form-group pb-0">
                    <a class="dropdown-item py-3"
                        href="{{ route('search', ['data' => now()]) }}">{{ __('global.today') }}</a>
                    <a class="dropdown-item py-3"
                        href="{{ route('search', ['data' => \Carbon\Carbon::today()->subDays(7)]) }}">{{ __('global.last-week') }}</a>
                    <a class="dropdown-item py-3"
                        href="{{ route('search', ['data' => \Carbon\Carbon::today()->subDays(30)]) }}">{{ __('global.last-month') }}</a>

                </div>
            </div>
        </div>
        <button class="btn alt-btn dropdown-toggle mr-3 d-block d-md-none" type="button" data-toggle="modal"
            data-target="#date-modal">
            {{ __('global.date') }}
        </button>
    </div>
</div>
