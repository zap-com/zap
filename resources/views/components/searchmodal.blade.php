<div id="search-modal" class="modal zap-modal sec-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog h-100" role="document">
        <div class="modal-content h-100">
            <div class="modal-header">
                <h4>{{ __('global.choose-category') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body dropdown-multicol3 px-0 text-left">
                <input type="radio" id="cat" class="d-none">
                <label for="cat" class="dropdown-item align-items-start justify-content-start"
                    onclick="document.getElementById('search-modal').style.display='none'">{{ __('global.all-categories') }}</label>

                @foreach ($categories as $category)
                    <input type="radio" name="cat" id="cat-{{ $category->id }}" value="{{ $category->id }}"
                        class="d-none">
                    <label for="cat-{{ $category->id }}" class="dropdown-item align-items-start justify-content-start"
                        onclick="document.getElementById('search-modal').style.display='none'">
                        @if (session()->get('locale') == 'it')
                            {{ $category->name_it }}
                        @else
                            {{ $category->name }}
                        @endif
                    </label>

                @endforeach
            </div>
        </div>
    </div>
</div>
