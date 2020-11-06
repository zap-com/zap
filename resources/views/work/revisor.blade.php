<x-app>

    <div id="revContainer" class="container pt-5 pb-3">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Diventa un revisore</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12 text-center">
                <form action="{{ route('work.revisor', Auth::user()) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn  b-btn ">Voglio diventare un revisore</button>

                </form>
            </div>
        </div>
    </div>

</x-app>
