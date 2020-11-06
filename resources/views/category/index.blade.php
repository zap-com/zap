<x-app sticky="1">


    <div class="container">
        <div class="row">
            <div id="listCol" class="col-12 justify-content-center align-items-center px-2 px-md-5">
                @foreach ($announcements as $ad)
                    <x-card-l :ad='$ad' />
                @endforeach

            </div>


        </div>
    </div>
</x-app>
