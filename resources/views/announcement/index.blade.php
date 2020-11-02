<x-app>
    <div class="container">
        <div class="row">
            <div id="listCol" class="col-12 justify-content-center align-items-center px-2 px-md-5" >
                @foreach ($announcements as $ad)
                     <x-card-l :ad='$ad' />
                @endforeach
               
            </div>

            {{-- <div  class="col-12 ml-5">{{$announcements->links()}} </div> --}}
        </div>
    </div>

    <script src="{{ asset('js/infiniteScroll.js') }}"></script>

</x-app>
