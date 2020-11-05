<x-app>
    @if ($announcement)
        {{ $announcement->title }}

        <form action="{{ route('revisor.accept', compact('announcement')) }}" method="POST">
            @csrf
            <button class='btn btn-large btn-success' type='submit'>Accetta</button>
        </form>

        <form action="{{ route('revisor.reject', compact('announcement')) }}" method="POST">
            @csrf
            <button class='btn btn-large btn-danger' type='submit'>Rifiuta</button>
        </form>
    @else

        <h1>Non ci sono annunci da revisionare</h1>
    @endif
</x-app>
