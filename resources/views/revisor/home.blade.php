<x-app>

    @if($announcement->count() == 0 )
        <div class="container">
        <div class="row">
            <div class="col-12 text-center my-5">
               <h1>Non ci sono annunci da revisionare</h1>
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


</x-app>
