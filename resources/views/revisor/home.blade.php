<x-app>

    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                @if ($mode ?? '')
                    <div class="alert alert-danger">
                        {{ $mode ?? '' }}
                    </div>
                @endif
            </div>

        </div>
    </div>

    @if ($announcement->count() == 0 && !$mode)
        <div class="container">
            <div class="row">
                <div class="col-12 text-center my-5">
                    <h1>Non ci sono annunci da revisionare</h1>
                </div>
            </div>
        </div>

    @elseif($announcement->count() == 0 && $mode)
        <div class="container">
            <div class="row">
                <div class="col-12 text-center my-5">
                    <h1>Il cestino è vuoto</h1>
                </div>
            </div>
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div id="listCol" class="col-12 justify-content-center align-items-center px-2 px-md-5">
                @if ($announcement)
                    @foreach ($announcement as $announcement)
                        <x-card-rev :ad='$announcement' />
                    @endforeach
                @else
                    <h1>{{ __('revisor.no-announcement') }}</h1>
                @endif
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/globalslider.js') }}"></script>
</x-app>
