<div id="region-modal" class="modal zap-modal sec-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog h-100" role="document">
        <div class="modal-content h-100">
            <div class="modal-header">
                <h4>{{ __('home.where') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body dropdown-multicol3 px-0 text-left">
                <a class="dropdown-item" href="{{ route('region', ['regione' => 'abruzzo']) }}">Abruzzo</a>
                <a class="dropdown-item" href="{{ route('region', ['regione' => 'basilicata']) }}">Basilicata</a>
                <a class="dropdown-item" href="{{ route('region', ['regione' => 'calabria']) }}">Calabria</a>
                <a class="dropdown-item" href="{{ route('region', ['regione' => 'campania']) }}">Campania</a>
                <a class="dropdown-item"
                    href="{{ route('region', ['regione' => 'emilia-romagna']) }}">Emilia-Romagna</a>
                <a class="dropdown-item"
                    href="{{ route('region', ['regione' => 'friuli-venezia-giulia']) }}">Friuli-Venezia Giulia</a>
                <a class="dropdown-item" href="{{ route('region', ['regione' => 'lazio']) }}">Lazio</a>
                <a class="dropdown-item" href="{{ route('region', ['regione' => 'liguria']) }}">Liguria</a>
                <a class="dropdown-item" href="{{ route('region', ['regione' => 'lombardia']) }}">Lombardia</a>
                <a class="dropdown-item" href="{{ route('region', ['regione' => 'marche']) }}">Marche</a>
                <a class="dropdown-item" href="{{ route('region', ['regione' => 'molise']) }}">Molise</a>
                <a class="dropdown-item" href="{{ route('region', ['regione' => 'piemonte']) }}">Piemonte</a>
                <a class="dropdown-item" href="{{ route('region', ['regione' => 'puglia']) }}">Puglia</a>
                <a class="dropdown-item" href="{{ route('region', ['regione' => 'sardegna']) }}">Sardegna</a>
                <a class="dropdown-item" href="{{ route('region', ['regione' => 'sicilia']) }}">Sicilia</a>
                <a class="dropdown-item" href="{{ route('region', ['regione' => 'toscana']) }}">Toscana</a>
                <a class="dropdown-item"
                    href="{{ route('region', ['regione' => 'trentino-alto-adige-sudtirol']) }}">Trentino-Alto
                    Adige</a>
                <a class="dropdown-item" href="{{ route('region', ['regione' => 'umbria']) }}">Umbria</a>
                <a class="dropdown-item"
                    href="{{ route('region', ['regione' => 'valle-d-aosta-vallee-d-aoste']) }}">Valle d'Aosta</a>
                <a class="dropdown-item" href="{{ route('region', ['regione' => 'veneto']) }}">Veneto</a>
            </div>
        </div>
    </div>
</div>
