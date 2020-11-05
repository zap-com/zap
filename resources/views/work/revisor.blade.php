<x-app>

    <h1>Diventa un revisore</h1>

<form action="{{route('work.revisor', Auth::user())}}" method="POST">
    @csrf
    <button type="submit" class="btn btn-large btn-success">Voglio diventare un revisore</button>
</form>

</x-app>