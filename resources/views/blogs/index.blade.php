<x-layout>
    <x-slot:title>Novedades del Blog</x-slot:title>
<div class="text-start mb-4">
    @auth
        <a href="{{ route('blogs.create') }}" class="btn btn-success"> Crear Entrada</a>
    @endauth
</div>

    <h1 class="row justify-content-center">Conocé las últimas novedades</h1>

    <div class="row justify-content-center">
        @forelse ($blogs as $blog)
            <div class="col-md-6 mt-5">
                <h3 class="row justify-content-center">{{ $blog->titulo }}</h3>

                <div class="card shadow" style="overflow:hidden;">
                    @if($blog->imagen)
                        <img src="{{ asset('storage/' . $blog->imagen)}}" class="card-img-top"
                        alt="{{ $blog->titulo }}"
                        style="height:50vh; object-fit: cover;"
                        >
                    @else
                        <img
                            src="{{ asset('images/default-image.jpg') }}"
                            class="card-img-top"
                            alt="Imagen no disponible"
                            style="height: 200px; object-fit: contain"
                        >
                    @endif
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $blog->titulo }}</h5>
                        <p class="text-muted">{{ $blog->categoria }} | {{ \Carbon\Carbon::parse($blog->fecha)->format('d/m/Y') }}</p>
                        <p class="card-text">{{ Str::limit($blog->resumen, 150, '...') }}</p>
                        {{-- <p class="card-text text-dark">{{ $blog->resumen }}</p> --}}
                        <p class="text-secondary"><em>Por {{ $blog->autor }}</em></p>
                        <a href="{{ route('blogs.view', $blog->id) }}" class="btn btn-primary">Leer más</a>

                        @auth
                        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar esta entrada?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar Definitivamente</button>
                            {{-- <a href="{{ route('blogs.view', $blog->id) }}" class="btn btn-secondary">Cancelar</a> --}}


                        </form>

                        @endauth


                    </div>
                </div>

            </div>
     @empty
       <p>No hay entradas de blog aún.</p>
    @endforelse
        </div>
</x-layout>
