<x-layout>
    <x-slot:title>Crear Entrada</x-slot>

    <div class="container mt-4">
        <h1 class="mb-3">Ingresa una Nueva Entrada</h1>

        <form method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data">
            @csrf

            <input type="text" name="titulo" class="form-control mb-2 @error('titulo') is-invalid @enderror" placeholder="Título" value="{{ old('titulo') }}" required>
            @error('titulo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <input type="text" name="resumen" class="form-control mb-2 @error('resumen') is-invalid @enderror" placeholder="Resumen" value="{{ old('resumen') }}" required>
            @error('resumen')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <textarea name="contenido" class="form-control mb-2 @error('contenido') is-invalid @enderror" placeholder="Contenido" required>{{ old('contenido') }}</textarea>
            @error('contenido')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <input type="text" name="autor" class="form-control mb-2 @error('autor') is-invalid @enderror" placeholder="Autor" value="{{ old('autor') }}" required>
            @error('autor')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <input type="text" name="categoria" class="form-control mb-2 @error('categoria') is-invalid @enderror" placeholder="Categoría" value="{{ old('categoria') }}" required>
            @error('categoria')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <input type="file" name="imagen" class="form-control mb-3 @error('imagen') is-invalid @enderror">
            @error('imagen')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-success">Publicar</button>
        </form>
    </div>
</x-layout>
