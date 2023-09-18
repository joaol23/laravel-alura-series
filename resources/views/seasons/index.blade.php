<x-layout title="Temporadas de {!! $serie->name !!}">
    <div class="d-flex justify-content-center">
        <img src="{{ asset('storage/' . $serie->cover_path) }}" alt="Capa da serie" class="img_fluid" style="height: 400px" />
    </div>
    <ul class="list-group">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('episodes.index', $season->id) }}">
                    Temporada {{ $season->number }}
                </a>
                <span class="badge bg-secondary">
                    {{ $season->episodes->count() }}
                </span>
            </li>
        @endforeach
    </ul>
</x-layout>
