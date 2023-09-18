<x-layout title="Nova Série">
    <form action="{{ route('series.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-8">
                <label for="name">Nome:</label>
                <input type="text" autofocus value="{{ old('name') }}" name="name" id="name" class="form-control">
            </div>
            <div class="col-2">
                <label for="seasonsQtd">N° Temporadas:</label>
                <input type="text" value="{{ old('seasonsQtd') }}" name="seasonsQtd" id="seasonsQtd" class="form-control">
            </div>
            <div class="col-2">
                <label for="episodesPerSeason">Eps / Temporada:</label>
                <input type="text" value="{{ old('episodesPerSeason') }}" name="episodesPerSeason" id="episodesPerSeason" class="form-control">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <label for="cover" class="form-label">Capa</label>
                <input type="file" id="cover" name="cover" class="form-control" accept="image/gif, image/jpeg, image/png" />
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>
