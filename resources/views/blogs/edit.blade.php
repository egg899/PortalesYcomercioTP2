<x-layout>
    <x-slot:title>Editar Entrada</x-slot>

    <div class="container mt-5" style="max-width: 720px;">
        {{-- Botón Volver --}}
        <a href="{{ route('blogs.index') }}"
           class="btn btn-outline-primary mb-4 d-inline-flex align-items-center gap-2 shadow-sm"
           style="font-weight: 600; border-radius: 0.5rem; transition: background-color 0.3s, color 0.3s;">
            <i class="bi bi-arrow-left-short fs-4"></i>
            Volver al Blog
        </a>

        <h1 class="mb-4 fw-bold text-secondary">Editar: {{ $blog->titulo }}</h1>

        <form action="{{ route('blogs.update', ['id' => $blog->id]) }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="titulo" class="form-label fw-semibold">Título</label>
                <input
                    type="text"
                    name="titulo"
                    id="titulo"
                    class="form-control @error('titulo') is-invalid @enderror"
                    value="{{ old('titulo', $blog->titulo) }}"
                    required
                    autofocus
                >
                @error('titulo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            @if($blog->imagen)
                <div class="mb-4">
                    <label class="form-label fw-semibold d-block">Imagen Actual</label>
                    <img
                        src="{{ asset('storage/' . $blog->imagen) }}"
                        alt="Imagen actual de {{ $blog->titulo }}"
                        class="img-fluid rounded shadow-sm"
                        style="max-height: 320px; object-fit: contain;"
                    >
                </div>
            @endif

            <div class="mb-4">
                <label for="imagen" class="form-label fw-semibold">Nueva imagen (opcional)</label>
                <input
                    type="file"
                    name="imagen"
                    id="imagen"
                    class="form-control @error('imagen') is-invalid @enderror"
                    accept="image/*"
                >
                @error('imagen')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-5">
                <label for="contenido" class="form-label fw-semibold">Contenido</label>
                <textarea
                    name="contenido"
                    id="contenido"
                    class="form-control @error('contenido') is-invalid @enderror"
                    rows="9"
                    required
                    style="font-size: 1.05rem; line-height: 1.6;"
                >{{ old('contenido', $blog->contenido) }}</textarea>
                @error('contenido')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-lg w-100 shadow-sm" style="font-weight: 600;">
                Actualizar Entrada
            </button>
        </form>
    </div>
</x-layout>
