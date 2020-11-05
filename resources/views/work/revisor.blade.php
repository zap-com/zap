<x-app>
    <div class="container">
        <div class="row " >
            <div class="col-12 text-center my-5">

                <h1>Diventa un revisore</h1>

                <form action="{{ route('work.revisor', Auth::user()) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn b-btn">Voglio diventare un revisore</button>
                </form>
            </div>
        </div>
    </div>


</x-app>
