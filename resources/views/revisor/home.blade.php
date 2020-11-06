<x-app>

    <div class="container">
        <div class="row">
            <div id="listCol" class="col-12 justify-content-center align-items-center px-2 px-md-5">
                @if ($announcement)
                    @foreach ($announcement as $announcement)
                        <x-card-rev :ad='$announcement' />
                    @endforeach
                    {{ $announcement->links('pagination::bootstrap-4') }}
                @else
                    <h1>{{ __('revisor.no-announcement') }}</h1>
                @endif
            </div>
        </div>
    </div>

</x-app>
