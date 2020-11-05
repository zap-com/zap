<x-app>
    @if ($announcements->count() > 0 )
    <div id="listCol" class="col-12 justify-content-center align-items-center px-2 px-md-5">
        @foreach ($announcements as $announcement)
            <x-card-rev :ad='$announcement' />
     


        @endforeach

    </div>

       
    @else
        <div class="container h-100" style="height: 100%;">
            <div class="row">
                <div class="col-12 text-center mt-5">
                    <h1>Non ci sono annunci da revisionare</h1>

                </div>
            </div>
        </div>
    @endif
</x-app>

