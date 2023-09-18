@component('mail::message')
    # {{ $nomeSerie }} criada.

    A série {{ $nomeSerie }} com {{ $qtdSeasons }} e {{ $qtdEpisodesPerSeason }}

    Acesse aqui:

@component('mail::button', ['url' => route('seasons.index', $idSerie)])

    Ver série

@endcomponent

@endcomponent
