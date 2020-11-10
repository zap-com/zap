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
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/globalslider.js') }}"></script>
</x-app>
