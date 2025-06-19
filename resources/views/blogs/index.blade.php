

<x-layout>
    <x-slot:title>Novedades del Blog</x-slot:title>

    <div class="container py-5">
        @auth
            <div class="mb-4 text-end">
                <a href="{{ route('blogs.create') }}" class="btn btn-success shadow-sm">
                    <i class="bi bi-plus-circle me-1"></i> Crear Entrada
                </a>
            </div>
        @endauth

        <div class="text-center mb-5">
            <h1 class="display-5 text-primary">Últimas novedades y artículos</h1>
            <p class="lead text-muted">Te mantenemos al tanto de lo último en sonido, tecnología y tendencias con ElectroPods.</p>
        </div>

        <div class="row justify-content-center">
            @forelse ($blogs as $blog)
                <div class="col-md-6 col-lg-4 mb-5 d-flex align-items-stretch">
                    <div class="card shadow-sm border-0 w-100">
                        @if($blog->imagen)
                            <img src="{{ asset('storage/' . $blog->imagen) }}"
                                 class="card-img-top"
                                 alt="{{ $blog->titulo }}"
                                 style="height: 250px; object-fit: cover;">
                        @else
                            <img src="{{ asset('images/default-image.jpg') }}"
                                 class="card-img-top"
                                 alt="Imagen no disponible"
                                 style="height: 250px; object-fit: cover;">
                        @endif

                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title">{{ $blog->titulo }}</h5>
                                <p class="text-muted small">
                                    {{ $blog->categoria }} | {{ \Carbon\Carbon::parse($blog->fecha)->format('d/m/Y') }}
                                </p>
                                <p class="card-text">{{ Str::limit($blog->resumen, 150, '...') }}</p>
                                <p class="text-secondary"><em>Por {{ $blog->autor }}</em></p>
                            </div>

                            <div class="mt-3">
                                <a href="{{ route('blogs.view',['id'=>$blog->id]) }}" class="btn btn-sm btn-primary">Leer más</a>

                                @auth
                                    <a href="{{ route('blogs.edit', ['id'=>$blog->id]) }}" class="btn btn-sm btn-warning ms-1">Editar</a>

                                    <a href="{{ route('blogs.delete', ['id'=>$blog->id]) }}" class="btn btn-sm btn-danger">
                                        Eliminar
                                    </a>
                                    {{-- <form action="{{ route('blogs.destroy', ['id'=>$blog->id]) }}" method="POST" class="d-inline ms-1" onsubmit="return confirm('¿Estás seguro de eliminar esta entrada?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form> --}}
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center mt-5">
                    <p class="text-muted">Todavía no hay entradas publicadas. ¡Sé el primero en compartir algo nuevo!</p>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
