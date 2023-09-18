<x-layout title="Séries">
    @auth
        <a href="{{ route('series.create') }}" class="btn btn-dark mb-3">Adicionar</a>
    @endauth
    @isset($msgSucess)
        <div class="alert alert-success">
            {{ $msgSucess }}
        </div>
    @endisset
    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('storage/' . $serie->cover_path) }}" class="img-thumbnail me-3" width="100"
                        alt="Thumb serie">
                    @auth <a href="{{ route('seasons.index', $serie->id) }}"> @endauth
                        {{ $serie->name }}
                        @auth </a> @endauth
                    @auth
                    </div>
                    <span class="d-flex align-items-center justify-content-center">
                        <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-info btn-sm">
                            E
                        </a>
                        <form action="{{ route('series.destroy', $serie->id) }}" method="POST" class="ms-2">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                X
                            </button>
                        </form>
                    </span>
                @endauth
            </li>
        @endforeach
    </ul>
</x-layout>
