    <div id="listCol" class="col-12 justify-content-center align-items-center px-2 px-md-5">
        <div class="container px-1 px-md-3">
            <div class="row mx-1 mx-md-0 my-4 py-2">
                <div class="col-12 col-md-4 col-lg-3 pb-5">
                    <img src="https://placehold.it/300x300/999/CCC" alt="" class="img-thumbnail avatar-large">
                    <h2 class="text-center py-2">{{ Auth::user()->name }}</h2>
                    <a href="{{ route('profile.edit') }}"
                        class="h5 text-center text-md-left">{{ __('profile.edit-title') }}</a>
                </div>
                <div id="prodcol" class="px-0 px-md-3 col-12 col-md-6 col-md-9">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
