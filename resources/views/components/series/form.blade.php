<form action="{{ $action }}" method="POST">
    @csrf
    @isset($update)
        @method('PUT')
    @endisset

    <div class="mb-3">
        <label for="name">Nome</label>
        <input type="text" @isset($name)value="{{ $name }}"@endisset name="name"
            id="name" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Adicionar</button>
</form>
