<div id="category-modal" class="modal zap-modal sec-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog h-100" role="document">
        <div class="modal-content h-100">
            <div class="modal-header">
                <h4>{{ __('global.choose-category') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body dropdown-multicol3 px-0">
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
    </div>
</div>

<div id="place-modal" class="modal zap-modal sec-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog h-100" role="document">
        <div class="modal-content h-100">
            <div class="modal-header">
                <h4>{{ __('global.place') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body dropdown-multicol3 px-0">
                <form action="{{ route('search.locality') }}" method="GET" class="px-3">
                    @csrf
                    <div class="form-group">
                        <div class="d-flex flex-row">
                            <input type="hidden" id="hiddenplacemobile" name="hiddenplacemobile" value="">
                            <input type="text" id="addressinputmobile" name="address-input-mobile" class="form-control"
                                placeholder="{{ __('global.search-place') }}">

                            <button class="btn b-btn ml-3" type="submit">{{ __('global.search-btn') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
