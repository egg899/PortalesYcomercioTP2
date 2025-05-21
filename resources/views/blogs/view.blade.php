<x-layout>
    <x-slot:title>{{ $blog->titulo }}</x-slot>

    <h1 class="text-center my-4">{{ $blog->titulo }}</h1>

    <p class="text-muted text-center">Publicado el {{ $blog->fecha->format('d/m/Y') }} | Categoría: {{ $blog->categoria }}</p>

    @if ($blog->imagen)
        <div class="text-center mb-4">
            <img src="{{ asset('storage/' . $blog->imagen) }}" alt="{{ $blog->titulo }}" style="max-width: 100%; height: auto;">
        </div>
    @else
        <img
                            src="{{ asset('images/default-image.jpg') }}"
                            class="card-img-top"
                            alt="Imagen no disponible"
                            style="height: 200px; object-fit: contain"
                        >
    @endif

    <div class="mx-auto" style="max-width: 700px;">
        <p>{{ $blog->contenido }}</p>
    </div>
</x-layout>
